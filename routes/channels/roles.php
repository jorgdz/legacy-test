<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;

/* TODO: pending add middleware permission:[name_middleware]  */
Route::apiResource('roles', RoleController::class)->middleware(['auth:sanctum']);
