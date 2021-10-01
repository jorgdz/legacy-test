<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CurriculumController;

// Route::get('/meshs', [CurriculumController::class, 'index'])->middleware(['auth:sanctum', 'permission:meshs-listar-mallas']);
// Route::get('/meshs/{curriculum}', [CurriculumController::class, 'show'])->middleware(['auth:sanctum', 'permission:meshs-obtener-malla']);
// Route::get('/meshs/{curriculum}/subject', [CurriculumController::class, 'showMattersByMesh'])->middleware(['auth:sanctum', 'permission:matters-by-meshs-obtener-materias-por-malla']);
// Route::post('/meshs', [CurriculumController::class, 'store'])->middleware(['auth:sanctum', 'permission:meshs-crear-mallas']);
// Route::put('/meshs/{curriculum}', [CurriculumController::class, 'update'])->middleware(['auth:sanctum', 'permission:meshs-actualizar-mallas']);
// Route::delete('/meshs/{curriculum}', [CurriculumController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:meshs-borrar-malla']);
// Route::get('/meshs/{curriculum}/component', [CurriculumController::class, 'learningComponentByMesh'])->middleware(['auth:sanctum'/*, 'permission:learning_components-listar-componente-aprendizaje'*/]);


Route::get('/curriculums', [CurriculumController::class, 'index'])->middleware(['auth:sanctum', 'permission:meshs-listar-mallas']);
Route::get('/curriculums/{curriculum}', [CurriculumController::class, 'show'])->middleware(['auth:sanctum', 'permission:meshs-obtener-malla']);
Route::get('/curriculums/{curriculum}/subject', [CurriculumController::class, 'showMattersByMesh'])->middleware(['auth:sanctum', 'permission:matters-by-meshs-obtener-materias-por-malla']);
Route::post('/curriculums', [CurriculumController::class, 'store'])->middleware(['auth:sanctum', 'permission:meshs-crear-mallas']);
Route::put('/curriculums/{curriculum}', [CurriculumController::class, 'update'])->middleware(['auth:sanctum', 'permission:meshs-actualizar-mallas']);
Route::delete('/curriculums/{curriculum}', [CurriculumController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:meshs-borrar-malla']);
Route::get('/curriculums/{curriculum}/component', [CurriculumController::class, 'learningComponentByMesh'])->middleware(['auth:sanctum', 'permission:learning_components-listar-componente-aprendizaje']);
