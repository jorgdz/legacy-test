<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaController;

Route::get('/areas', [AreaController::class, 'index'])->middleware(['auth:sanctum', 'permission:areas-listar-areas']);
Route::get('/areas/{id}', [AreaController::class, 'show'])->middleware(['auth:sanctum', 'permission:areas-obtener-area']);
Route::post('/areas', [AreaController::class, 'store'])->middleware(['auth:sanctum', 'permission:areas-crear-area']);
Route::put('/areas/{area}', [AreaController::class, 'update'])->middleware(['auth:sanctum', 'permission:areas-actualizar-area']);
Route::patch('/areas/{area}', [AreaController::class, 'update'])->middleware(['auth:sanctum', 'permission:areas-actualizar-area']);
Route::delete('/areas/{area}', [AreaController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:areas-borrar-area']);
