<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeReport;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\TypeReportsCache;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeReportRequest;
use App\Repositories\OtherSignatureRepository;
use App\Repositories\CollaboratorSignatureRepository;
use App\Http\Controllers\Api\Contracts\ITypeReportsController;

class TypeReportsController extends Controller implements ITypeReportsController
{
    use RestResponse;

    private $typeReportsCache;
    private $otherSignatureRepository, $collaboratorSignatureRepository;


    /**
     * __construct
     *
     * @param  mixed $typeReportsCache
     * @param  mixed $otherSignatureRepository
     * @param  mixed $collaboratorSignatureRepository
     * @return void
     */
    public function __construct(TypeReportsCache $typeReportsCache, OtherSignatureRepository $otherSignatureRepository, CollaboratorSignatureRepository $collaboratorSignatureRepository)
    {
        $this->typeReportsCache = $typeReportsCache;
        $this->otherSignatureRepository = $otherSignatureRepository;
        $this->collaboratorSignatureRepository = $collaboratorSignatureRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeReportsCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeReportRequest $request)
    {
        DB::beginTransaction();
        try {
            $typeReport = new TypeReport($request->all());
            $typeReport = $this->typeReportsCache->save($typeReport);

            if (isset($request["signatures"])) {
                $signatures = collect($request["signatures"])->map(function ($item, $key) use ($typeReport) {
                    return collect($item)->put('type_report_id', $typeReport->id)->toArray();
                })->toArray();
                ($request['rrhh']) ? $this->collaboratorSignatureRepository->saveMultiple($signatures) : $this->otherSignatureRepository->saveMultiple($signatures);
                $typeReport['signatures'] = $signatures;
            }

            DB::commit();
            return $this->success($typeReport);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typeReportsCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeReport  $typeReport
     * @return \Illuminate\Http\Response
     */
    public function update(TypeReportRequest $request, TypeReport $typeReport)
    {
        DB::beginTransaction();
        try {
            $typeReport->fill($request->all());

            if ($typeReport->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->typeReportsCache->save($typeReport);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeReport  $typeReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeReport $typeReport)
    {
        DB::beginTransaction();
        try {
            $response = $this->typeReportsCache->destroy($typeReport);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
