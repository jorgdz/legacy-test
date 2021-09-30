<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\TenantModuleController;

/*============================ Landlord routes========================*/
Route::get('/tenants', [TenantController::class, 'index']);
Route::apiResource('tenants', TenantController::class)->except(['index', 'EnableTenant'])->middleware('auth:sanctum');

Route::patch('/enable-tenant/{id}', [TenantController::class, 'EnableTenant'])->middleware('auth:sanctum');
Route::put('/enable-tenant/{id}', [TenantController::class, 'EnableTenant'])->middleware('auth:sanctum');

/**
 * TenantModule
 */
Route::apiResource('tenant-modules', TenantModuleController::class)->except(['EnableTenantModule'])->middleware('auth:sanctum');

Route::patch('/enable-module/{id}', [TenantModuleController::class, 'EnableTenantModule'])->middleware('auth:sanctum');
Route::put('/enable-module/{id}', [TenantModuleController::class, 'EnableTenantModule'])->middleware('auth:sanctum');