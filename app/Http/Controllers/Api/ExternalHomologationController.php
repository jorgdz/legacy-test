<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\RestResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ExternalHomologation;
use App\Cache\ExternalHomologationCache;
use App\Exceptions\Custom\ConflictException;
use App\Http\Requests\ExternalHomologationRequest;
use App\Http\Controllers\Api\Contracts\IExternalHomologationController;

class ExternalHomologationController extends Controller implements IExternalHomologationController
{
    use RestResponse;

    private $externalHomologationCache;

    /**
     * __construct
     *
     * @param  mixed $externalHomologationCache
     * @return void
     */
    public function __construct(ExternalHomologationCache $externalHomologationCache)
    {
        $this->externalHomologationCache = $externalHomologationCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->externalHomologationCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Cache\ExternalHomologationCache  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExternalHomologationRequest $request)
    {
        DB::beginTransaction();
        try {
            $externalHomologation = new ExternalHomologation($request->all());

            $conditionals = [
                ['inst_subject_id', $request['inst_subject_id']],
                ['subject_id', $request['subject_id']]
            ];
            $hasRegister = $this->externalHomologationCache->findByConditionals($conditionals);

            if ($hasRegister) throw new ConflictException(__('messages.exist-instance'));

            $response = $this->externalHomologationCache->save($externalHomologation);

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
        return $this->success($this->externalHomologationCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Cache\ExternalHomologationCache  $request
     * @param  \App\Models\ExternalHomologation  $externalHomologation
     * @return \Illuminate\Http\Response
     */
    public function update(ExternalHomologationRequest $request, ExternalHomologation $externalHomologation)
    {
        DB::beginTransaction();
        try {
            $externalHomologation->fill($request->all());

            if ($externalHomologation->isClean())
                return $this->information(__('messages.nochange'));

            $conditionals = [
                ['id', '<>', $externalHomologation->id],
                ['inst_subject_id', $request['inst_subject_id']],
                ['subject_id', $request['subject_id']]
            ];
            $hasRegister = $this->externalHomologationCache->findByConditionals($conditionals);

            if ($hasRegister) throw new ConflictException(__('messages.exist-instance'));

            $response = $this->externalHomologationCache->save($externalHomologation);

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
     * @param  \App\Models\ExternalHomologation  $externalHomologation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExternalHomologation $externalHomologation)
    {
        DB::beginTransaction();
        try {
            $response = $this->externalHomologationCache->destroy($externalHomologation);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
