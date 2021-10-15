<?php

use App\Http\Controllers\Api\TypeApplicationStatusController;
use Illuminate\Support\Facades\Route;

Route::get('/type-application-status', [TypeApplicationStatusController::class, 'index'])->middleware(['auth:sanctum', 'permission:type-application-status-listar-estado-tipo-solicitudes']);
Route::get('/type-application-status/{id}', [TypeApplicationStatusController::class, 'show'])->middleware(['auth:sanctum', 'permission:type-application-status-obtener-estado-tipo-solicitudes']);
Route::post('/type-application-status', [TypeApplicationStatusController::class, 'store'])->middleware(['auth:sanctum', 'permission:type-application-status-crear-estado-tipo-solicitudes']);
Route::put('/type-application-status/{tas}', [TypeApplicationStatusController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-application-status-actualizar-estado-tipo-solicitudes']);
Route::delete('/type-application-status/{tas}', [TypeApplicationStatusController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:type-application-status-borrar-estado-tipo-solicitudes']);
