<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TenantController;

/*============================ Landlord routes========================*/
Route::get('/tenants', [TenantController::class, 'index']);
Route::apiResource('tenants', TenantController::class)->except(['index'])->middleware('auth:sanctum');
