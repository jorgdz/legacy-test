<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EducationLevelController;

Route::get('/education-levels', [EducationLevelController::class, 'index'])->middleware(['auth:sanctum', 'permission:education-levels-listar-niveles-educativos']);
Route::get('/education-levels/{id}', [EducationLevelController::class, 'show'])->middleware(['auth:sanctum', 'permission:education-levels-obtener-nivel-educativo']);
Route::post('/education-levels', [EducationLevelController::class, 'store'])->middleware(['auth:sanctum', 'permission:education-levels-crear-nivel-educativo']);
Route::put('/education-levels/{educationLevel}', [EducationLevelController::class, 'update'])->middleware(['auth:sanctum', 'permission:education-levels-actualizar-nivel-educativo']);
Route::delete('/education-levels/{educationLevel}', [EducationLevelController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:education-levels-borrar-nivel-educativo']);
