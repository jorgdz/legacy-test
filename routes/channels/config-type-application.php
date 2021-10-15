<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ConfigTypeApplicationController;

/**
 * Type Application
 */
Route::get('/config-type-application', [ConfigTypeApplicationController::class, 'index'])->middleware(['auth:sanctum', 'permission:config-type-application-listar-config-tipo-solicitudes']);
Route::get('/config-type-application/{id}', [ConfigTypeApplicationController::class, 'show'])->middleware(['auth:sanctum', 'permission:config-type-application-obtener-config-tipo-solicitudes']);
Route::post('/config-type-application', [ConfigTypeApplicationController::class, 'store'])->middleware(['auth:sanctum', 'permission:config-type-application-crear-config-tipo-solicitudes']);
Route::put('/config-type-application/{typeapplication}', [ConfigTypeApplicationController::class, 'update'])->middleware(['auth:sanctum', 'permission:config-type-application-actualizar-config-tipo-solicitudes']);
Route::delete('/config-type-application/{typeapplication}', [ConfigTypeApplicationController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:config-type-application-borrar-config-tipo-solicitudes']);