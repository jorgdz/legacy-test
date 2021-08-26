<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PermissionController;

/* TODO: pending add middleware permission:[name_middleware]  */
Route::apiResource('permissions', PermissionController::class)->middleware(['auth:sanctum']);