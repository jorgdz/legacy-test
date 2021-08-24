<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;

interface IAuthController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request);
}
