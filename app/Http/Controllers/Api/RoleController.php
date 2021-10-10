<?php

namespace App\Http\Controllers\Api;

use App\Cache\RoleCache;
use App\Models\Role;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Controllers\Api\Contracts\IRoleController;
use App\Repositories\RoleRepository;
use App\Traits\Helper;

class RoleController extends Controller implements IRoleController
{
    use RestResponse, Helper;

    private $roleCache;
    private $repository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (RoleRepository $repository, RoleCache $roleCache) {
        $this->roleCache = $roleCache;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->roleCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request) {
        $request['guard_name'] = 'api';

        $role = new Role($request->all());
        return $this->success($this->roleCache->save($role), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id) {
        return $this->success($this->roleCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  model  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role) {
        $role->fill($request->all());

        if ($role->isClean() && !isset($request['permissions']))
            return $this->information(__('messages.nochange'));

        $response = $this->roleCache->save($role);

        if (isset($request['permissions']))
            $role->syncPermissions($request['permissions']);

        return $this->success($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  model  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role) {
        $this->repository->deleteModelHasRole($role->id);
        $role->revokePermissionTo($role->getAllPermissions()->pluck('name')->toArray());
        $response = $this->roleCache->destroy($role);
        return $response;
    }
}
