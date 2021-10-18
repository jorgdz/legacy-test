<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExternalHomologationController;

Route::get('/external-homologations', [ExternalHomologationController::class, 'index'])->middleware(['auth:sanctum', 'permission:external-homologations-listar-homologacion-externa']);
Route::get('/external-homologations/{id}', [ExternalHomologationController::class, 'show'])->middleware(['auth:sanctum', 'permission:external-homologations-obtener-homologacion-externa']);
Route::post('/external-homologations', [ExternalHomologationController::class, 'store'])->middleware(['auth:sanctum', 'permission:external-homologations-crear-homologacion-externa']);
Route::put('/external-homologations/{externalHomologation}', [ExternalHomologationController::class, 'update'])->middleware(['auth:sanctum', 'permission:external-homologations-actualizar-homologacion-externa']);
Route::patch('/external-homologations/{externalHomologation}', [ExternalHomologationController::class, 'update'])->middleware(['auth:sanctum', 'permission:external-homologations-actualizar-homologacion-externa']);
Route::delete('/external-homologations/{externalHomologation}', [ExternalHomologationController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:external-homologations-borrar-homologacion-externa']);
