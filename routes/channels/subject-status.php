<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubjectStatusController;

Route::get('/matter-status', [SubjectStatusController::class, 'index'])->middleware(['auth:sanctum', 'permission:matter-status-listar-matter-status']);
Route::get('/matter-status/{id}', [SubjectStatusController::class, 'show'])->middleware(['auth:sanctum', 'permission:matter-status-obtener-matter-status']);
Route::post('/matter-status', [SubjectStatusController::class, 'store'])->middleware(['auth:sanctum', 'permission:matter-status-crear-matter-status']);
Route::put('/matter-status/{subjectstatus}', [SubjectStatusController::class, 'update'])->middleware(['auth:sanctum', 'permission:matter-status-actualizar-matter-status']);
Route::patch('/matter-status/{subjectstatus}', [SubjectStatusController::class, 'update'])->middleware(['auth:sanctum', 'permission:matter-status-actualizar-matter-status']);
Route::delete('/matter-status/{subjectstatus}', [SubjectStatusController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:matter-status-borrar-matter-status']);

Route::get('/subject-status', [SubjectStatusController::class, 'index'])->middleware(['auth:sanctum', 'permission:matter-status-listar-matter-status']);
Route::get('/subject-status/{id}', [SubjectStatusController::class, 'show'])->middleware(['auth:sanctum', 'permission:matter-status-obtener-matter-status']);
Route::post('/subject-status', [SubjectStatusController::class, 'store'])->middleware(['auth:sanctum', 'permission:matter-status-crear-matter-status']);
Route::put('/subject-status/{subjectstatus}', [SubjectStatusController::class, 'update'])->middleware(['auth:sanctum', 'permission:matter-status-actualizar-matter-status']);
Route::patch('/subject-status/{subjectstatus}', [SubjectStatusController::class, 'update'])->middleware(['auth:sanctum', 'permission:matter-status-actualizar-matter-status']);
Route::delete('/subject-status/{subjectstatus}', [SubjectStatusController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:matter-status-borrar-matter-status']);