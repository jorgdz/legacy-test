<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MatterController;

Route::get('/matters', [MatterController::class, 'index'])->middleware(['auth:sanctum', 'permission:matters-listar-matters']);
Route::get('/matters/{id}', [MatterController::class, 'show'])->middleware(['auth:sanctum', 'permission:matters-obtener-matter']);
Route::post('/matters', [MatterController::class, 'store'])->middleware(['auth:sanctum', 'permission:matters-crear-matter']);
Route::put('/matters/{matter}', [MatterController::class, 'update'])->middleware(['auth:sanctum', 'permission:matters-actualizar-matter']);
Route::patch('/matters/{matter}', [MatterController::class, 'update'])->middleware(['auth:sanctum', 'permission:matters-actualizar-matter']);
Route::delete('/matters/{matter}', [MatterController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:matters-borrar-matter']);
