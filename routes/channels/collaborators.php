<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CollaboratorController;

Route::get('/collaborators/{collaborator}', [CollaboratorController::class, 'show'])->middleware(['auth:sanctum'/*, 'permission:collaborators-obtener-colaborador'*/]);
Route::post('/collaborators', [CollaboratorController::class, 'store'])->middleware(['auth:sanctum'/*, 'permission:collaborators-crear-colaborador'*/]);
