<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MeshsController;

Route::get('/meshs', [MeshsController::class, 'index'])->middleware(['auth:sanctum', 'permission:meshs-listar-mallas']);
Route::get('/meshs/{mesh}', [MeshsController::class, 'show'])->middleware(['auth:sanctum', 'permission:meshs-obtener-malla']);
Route::get('/meshs/{mesh}/matters', [MeshsController::class, 'showMattersByMesh'])->middleware(['auth:sanctum', 'permission:matters-by-meshs-obtener-materias-por-malla']);
Route::post('/meshs', [MeshsController::class, 'store'])->middleware(['auth:sanctum', 'permission:meshs-crear-mallas']);
Route::put('/meshs/{mesh}', [MeshsController::class, 'update'])->middleware(['auth:sanctum', 'permission:meshs-actualizar-mallas']);
Route::delete('/meshs/{mesh}', [MeshsController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:meshs-borrar-malla']);
