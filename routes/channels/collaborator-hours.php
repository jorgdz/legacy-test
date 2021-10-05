<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CollaboratorHourController;

Route::get('/collaborator-hours', [CollaboratorHourController::class, 'index'])->middleware(['auth:sanctum', 'permission:collaborator-hours-listar-horas-colaborador']);
Route::get('/collaborator-hours/{id}', [CollaboratorHourController::class, 'show'])->middleware(['auth:sanctum', 'permission:collaborator-hours-obtener-hora-colaborador']);
Route::post('/collaborator-hours', [CollaboratorHourController::class, 'store'])->middleware(['auth:sanctum', 'permission:collaborator-hours-crear-hora-colaborador']);
Route::put('/collaborator-hours/{collaboratorHour}', [CollaboratorHourController::class, 'update'])->middleware(['auth:sanctum', 'permission:collaborator-hours-actualizar-hora-colaborador']);
Route::delete('/collaborator-hours/{collaboratorHour}', [CollaboratorHourController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:collaborator-hours-borrar-hora-colaborador']);
