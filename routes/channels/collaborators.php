<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CollaboratorController;

Route::get('/collaborators', [CollaboratorController::class, 'index'])->middleware(['auth:sanctum', 'permission:collaborators-listar-colaborador']);
Route::get('/collaborators/{collaborator}', [CollaboratorController::class, 'show'])->middleware(['auth:sanctum', 'permission:collaborators-obtener-colaborador']);
Route::post('/collaborators', [CollaboratorController::class, 'store'])->middleware(['auth:sanctum', 'permission:collaborators-crear-colaborador']);
Route::put('/collaborators/{collaborator}', [CollaboratorController::class, 'update'])->middleware(['auth:sanctum', 'permission:collaborators-actualizar-colaborador']);
Route::patch('/collaborators/{collaborator}', [CollaboratorController::class, 'changeStatus'])->middleware(['auth:sanctum', 'permission:collaborators-actualizar-colaborador']);
Route::delete('/collaborators/{collaborator}', [CollaboratorController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:collaborators-eliminar-colaborador']);