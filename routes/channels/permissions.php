<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PermissionController;

/* TODO: pending add middleware permission:[name_middleware]  */

Route::get('/permissions', [PermissionController::class, 'index'])->middleware(['auth:sanctum', 'permission:Listar permisos']);
Route::get('/permissions/{id}', [PermissionController::class, 'show'])->middleware(['auth:sanctum', 'permission:Obtener un permiso']);
Route::post('/permissions', [PermissionController::class, 'store'])->middleware(['auth:sanctum', 'permission:Crear un permiso']);
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->middleware(['auth:sanctum', 'permission:Actualizar un permiso']);
Route::patch('/permissions/{permission}', [PermissionController::class, 'update'])->middleware(['auth:sanctum', 'permission:Actualizar un permiso']);
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:Borrar un permiso']);
