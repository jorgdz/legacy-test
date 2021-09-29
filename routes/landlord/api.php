<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TenantController;

/*============================ Landlord routes========================*/
Route::get('/tenants', [TenantController::class, 'index']);
Route::apiResource('tenants', TenantController::class)->except(['index', 'restoreTenant'])->middleware('auth:sanctum');

Route::patch('/restore-tenant/{id}', [TenantController::class, 'restoreTenant'])->middleware('auth:sanctum');
Route::put('/restore-tenant/{id}', [TenantController::class, 'restoreTenant'])->middleware('auth:sanctum');
