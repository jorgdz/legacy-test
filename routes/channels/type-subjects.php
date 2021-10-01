<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeSubjectController;

Route::get('/type-matters', [TypeSubjectController::class, 'index'])->middleware(['auth:sanctum', 'permission:type-matters-listar-type-matters']);
Route::get('/type-matters/{id}', [TypeSubjectController::class, 'show'])->middleware(['auth:sanctum', 'permission:type-matters-obtener-type-matter']);
Route::post('/type-matters', [TypeSubjectController::class, 'store'])->middleware(['auth:sanctum', 'permission:type-matters-crear-type-matter']);
Route::put('/type-matters/{typesubject}', [TypeSubjectController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-matters-actualizar-type-matter']);
Route::patch('/type-matters/{typesubject}', [TypeSubjectController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-matters-actualizar-type-matter']);
Route::delete('/type-matters/{typesubject}', [TypeSubjectController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:type-matters-borrar-type-matter']);

Route::get('/type-subjects', [TypeSubjectController::class, 'index'])->middleware(['auth:sanctum', 'permission:type-matters-listar-type-matters']);
Route::get('/type-subjects/{id}', [TypeSubjectController::class, 'show'])->middleware(['auth:sanctum', 'permission:type-matters-obtener-type-matter']);
Route::post('/type-subjects', [TypeSubjectController::class, 'store'])->middleware(['auth:sanctum', 'permission:type-matters-crear-type-matter']);
Route::put('/type-subjects/{typesubject}', [TypeSubjectController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-matters-actualizar-type-matter']);
Route::patch('/type-subjects/{typesubject}', [TypeSubjectController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-matters-actualizar-type-matter']);
Route::delete('/type-subjects/{typesubject}', [TypeSubjectController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:type-matters-borrar-type-matter']);
