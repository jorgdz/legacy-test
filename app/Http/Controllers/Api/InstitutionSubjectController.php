<?php

namespace App\Http\Controllers\Api;

use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Models\InstitutionSubject;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Cache\InstitutionSubjectCache;
use App\Http\Requests\InstitutionSubjectRequest;
use App\Http\Controllers\Api\Contracts\IInstitutionSubjectController;

class InstitutionSubjectController extends Controller implements IInstitutionSubjectController
{
    use RestResponse;

    private $institutionSubjectCache;

    /**
     * __construct
     *
     * @param  mixed $institutionSubjectCache
     * @return void
     */
    public function __construct(InstitutionSubjectCache $institutionSubjectCache)
    {
        $this->institutionSubjectCache = $institutionSubjectCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->institutionSubjectCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\InstitutionSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitutionSubjectRequest $request)
    {
        DB::beginTransaction();
        try {
            $institutionSubject = new InstitutionSubject($request->all());

            $response = $this->institutionSubjectCache->save($institutionSubject);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->institutionSubjectCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\InstitutionSubjectRequest  $request
     * @param  \App\Models\InstitutionSubject  $institutionSubject
     * @return \Illuminate\Http\Response
     */
    public function update(InstitutionSubjectRequest $request, InstitutionSubject $institutionSubject)
    {
        DB::beginTransaction();
        try {
            $institutionSubject->fill($request->all());

            if ($institutionSubject->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->institutionSubjectCache->save($institutionSubject);

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
     * @param  \App\Models\InstitutionSubject  $institutionSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstitutionSubject $institutionSubject)
    {
        DB::beginTransaction();
        try {
            $response = $this->institutionSubjectCache->destroy($institutionSubject);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
