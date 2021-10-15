<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AreaGroupController;

Route::get('/group-areas', [AreaGroupController::class, 'index'])->middleware(['auth:sanctum', 'permission:group-areas-listar-areas']);
Route::get('/group-areas/{id}', [AreaGroupController::class, 'show'])->middleware(['auth:sanctum', 'permission:group-areas-obtener-area']);
Route::post('/group-areas', [AreaGroupController::class, 'store'])->middleware(['auth:sanctum', 'permission:group-areas-crear-area']);
Route::put('/group-areas/{areaGroup}', [AreaGroupController::class, 'update'])->middleware(['auth:sanctum', 'permission:group-areas-actualizar-area']);
Route::patch('/group-areas/{areaGroup}', [AreaGroupController::class, 'update'])->middleware(['auth:sanctum', 'permission:group-areas-actualizar-area']);
Route::delete('/group-areas/{areaGroup}', [AreaGroupController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:group-areas-borrar-area']);

Route::post('/group-areas/{id}/education-level-subjects', [AreaGroupController::class, 'assignEducationLevelSubjects'])->middleware(['auth:sanctum', 'permission:group-areas-asignar-carreras-materias']);