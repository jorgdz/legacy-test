<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubjectController;

Route::get('/matters', [SubjectController::class, 'index'])->middleware(['auth:sanctum', 'permission:matters-listar-matters']);
Route::get('/matters/{id}', [SubjectController::class, 'show'])->middleware(['auth:sanctum', 'permission:matters-obtener-matter']);
Route::post('/matters', [SubjectController::class, 'store'])->middleware(['auth:sanctum', 'permission:matters-crear-matter']);
Route::put('/matters/{subject}', [SubjectController::class, 'update'])->middleware(['auth:sanctum', 'permission:matters-actualizar-matter']);
Route::patch('/matters/{subject}', [SubjectController::class, 'update'])->middleware(['auth:sanctum', 'permission:matters-actualizar-matter']);
Route::delete('/matters/{subject}', [SubjectController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:matters-borrar-matter']);

Route::get('/subjects', [SubjectController::class, 'index'])->middleware(['auth:sanctum', 'permission:matters-listar-matters']);
Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->middleware(['auth:sanctum', 'permission:matters-obtener-matter']);
Route::post('/subjects', [SubjectController::class, 'store'])->middleware(['auth:sanctum', 'permission:matters-crear-matter']);
Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->middleware(['auth:sanctum', 'permission:matters-actualizar-matter']);
Route::patch('/subjects/{subject}', [SubjectController::class, 'update'])->middleware(['auth:sanctum', 'permission:matters-actualizar-matter']);
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:matters-borrar-matter']);
