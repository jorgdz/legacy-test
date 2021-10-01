<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\RestResponse;
use App\Models\SubjectStatus;
use Illuminate\Http\Response;
use App\Cache\SubjectStatusCache;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Exceptions\Custom\ConflictException;
use App\Http\Requests\StoreSubjectStatusRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\ISubjectStatusController;


class SubjectStatusController extends Controller implements ISubjectStatusController
{
    use RestResponse;

    private $subjectStatusCache;

    public function __construct(SubjectStatusCache $subjectStatusCache) {
        $this->subjectStatusCache = $subjectStatusCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->subjectStatusCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectStatusRequest $request) {
        DB::beginTransaction();
        try {
            $subjectStatus = new SubjectStatus($request->all());
            $subjectStatus = $this->subjectStatusCache->save($subjectStatus);

            DB::commit();
            return $this->success($subjectStatus, Response::HTTP_CREATED);
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
        return $this->success($this->subjectStatusCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubjectStatus $subjectstatus) {
        DB::beginTransaction();
        try {
            
            $subjectstatus->fill($request->all());
            if ($subjectstatus->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->subjectStatusCache->save($subjectstatus);

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
    public function destroy(SubjectStatus $subjectstatus) {
        DB::beginTransaction();
        try {
            $response = $this->subjectStatusCache->destroy($subjectstatus);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
