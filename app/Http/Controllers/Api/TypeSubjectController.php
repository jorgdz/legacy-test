<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeSubject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\RestResponse;
use App\Cache\TypeSubjectCache;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Exceptions\Custom\ConflictException;
use App\Http\Requests\StoreTypeSubjectRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\ITypeSubjectController;

class TypeSubjectController extends Controller implements ITypeSubjectController
{
    use RestResponse;

    private $typeSubjectCache;

    public function __construct(TypeSubjectCache $typeSubjectCache) {
        $this->typeSubjectCache = $typeSubjectCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->typeSubjectCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeSubjectRequest $request) {
        DB::beginTransaction();
        try {
           
            $tm = new TypeSubject($request->all());
            $tm = $this->typeSubjectCache->save($tm);

            DB::commit();
            return $this->success($tm);
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
    public function show($id) {
        return $this->success($this->typeSubjectCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeSubjectRequest $request, TypeSubject $typesubject) {
        DB::beginTransaction();
        try {
            $typesubject->fill($request->all());

            if ($typesubject->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->typeSubjectCache->save($typesubject);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeSubject $typesubject) {
        DB::beginTransaction();
        try {
            $response = $this->typeSubjectCache->destroy($typesubject);
           
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
