<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeMatterController;

Route::get('/type-matters', [TypeMatterController::class, 'index'])->middleware(['auth:sanctum', 'permission:type-matters-listar-type-matters']);
Route::get('/type-matters/{id}', [TypeMatterController::class, 'show'])->middleware(['auth:sanctum', 'permission:type-matters-obtener-type-matter']);
Route::post('/type-matters', [TypeMatterController::class, 'store'])->middleware(['auth:sanctum', 'permission:type-matters-crear-type-matter']);
Route::put('/type-matters/{typeMatter}', [TypeMatterController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-matters-actualizar-type-matter']);
Route::patch('/type-matters/{typeMatter}', [TypeMatterController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-matters-actualizar-type-matter']);
Route::delete('/type-matters/{typeMatter}', [TypeMatterController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:type-matters-borrar-type-matter']);
