<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

interface IRoleController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request);

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request);

    /**
     * show
     *
     * @param  mixed $role
     * @return void
     */
    public function show($id);

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $role
     * @return void
     */
    public function update(UpdateRoleRequest $request, Role $role);

    /**
     * destroy
     *
     * @param  mixed $role
     * @return void
     */
    public function destroy(Role $role);
}
