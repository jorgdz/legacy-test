<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeCalificationController;

Route::get('/type-califications', [TypeCalificationController::class, 'index'])->middleware(['auth:sanctum', 'permission:type-califications-listar-type-califications']);
Route::get('/type-califications/{id}', [TypeCalificationController::class, 'show'])->middleware(['auth:sanctum', 'permission:type-califications-obtener-type-calification']);
Route::post('/type-califications', [TypeCalificationController::class, 'store'])->middleware(['auth:sanctum', 'permission:type-califications-crear-type-calification']);
Route::put('/type-califications/{typeCalification}', [TypeCalificationController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-califications-actualizar-type-calification']);
Route::patch('/type-califications/{typeCalification}', [TypeCalificationController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-califications-actualizar-type-calification']);
Route::delete('/type-califications/{typeCalification}', [TypeCalificationController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:type-califications-borrar-type-calification']);
