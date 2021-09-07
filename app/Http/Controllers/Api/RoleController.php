<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IRoleController;

class RoleController extends Controller implements IRoleController
{
    use RestResponse;

    private $repository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (RoleRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $users = $this->repository->all($request);
        return $this->success($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request) {
        DB::beginTransaction();
        try {
            $request['guard_name'] = 'api';

            $role = new Role($request->all());
            $role = $this->repository->save($role);

            DB::commit();
            return $this->success($role, Response::HTTP_CREATED);
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
        $role = $this->repository->find($id);
        return $this->success($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  model  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role) {
        DB::beginTransaction();
        try {
            $role->fill($request->all());

            if ($role->isClean() && !isset($request['permissions']))
                throw new UnprocessableException(__('messages.nochange'));

            $response = $this->repository->save($role);

            if (isset($request['permissions'])) $role->syncPermissions($request['permissions']);

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
     * @param  model  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role) {
        DB::beginTransaction();
        try {
            $this->repository->deleteModelHasRole($role->id);
            $role->revokePermissionTo($role->getAllPermissions()->pluck('name')->toArray());
            $response = $this->repository->destroy($role);
            DB::commit();
            return $response;
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
