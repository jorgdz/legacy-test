<?php

namespace App\Http\Controllers\Api;

use App\Models\Permission;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IPermissionController;

class PermissionController extends Controller implements IPermissionController
{
    use RestResponse;

    private $repository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PermissionRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $permissions = $this->repository->all($request);
        return $this->success($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request) {
        DB::beginTransaction();
        try {
            $request['guard_name'] = 'api';

            $permission = new Permission($request->all());
            $permission = $this->repository->save($permission);

            DB::commit();
            return $this->success($permission, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex,
                    __('messages.internal-server-error'), Response::HTTP_CONFLICT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $permission = $this->repository->find($id);
        return $this->success($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission) {
        DB::beginTransaction();
        try {
            $permission->fill($request->all());
            
            if ($permission->isClean())
                throw new UnprocessableException(__('messages.nochange'));
            
            $response = $this->repository->save($permission);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex,
                    __('messages.internal-server-error'), Response::HTTP_CONFLICT);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission) {
        DB::beginTransaction();
        try {
            $response = $this->repository->destroy($permission);
            DB::commit();
            return $response;
        } catch (\Exception $ex) {
            DB::rollBack();
        }
    }
}
