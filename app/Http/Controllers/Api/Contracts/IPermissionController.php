<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

interface IPermissionController
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
    public function store(StorePermissionRequest $request);

    /**
     * show
     *
     * @param  int $id
     * @return void
     */
    public function show($id);

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $permission
     * @return void
     */
    public function update(UpdatePermissionRequest $request, Permission $permission);

    /**
     * destroy
     *
     * @param  mixed $permission
     * @return void
     */
    public function destroy(Permission $permission);
}
