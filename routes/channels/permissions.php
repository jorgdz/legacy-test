<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PermissionController;

Route::get('/permissions', [PermissionController::class, 'index'])->middleware(['auth:sanctum', 'permission:permissions-listar-perfiles']);
Route::get('/permissions/{id}', [PermissionController::class, 'show'])->middleware(['auth:sanctum', 'permission:permissions-obtener-permiso']);
Route::post('/permissions', [PermissionController::class, 'store'])->middleware(['auth:sanctum', 'permission:permissions-crear-permiso']);
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->middleware(['auth:sanctum', 'permission:permissions-actualizar-permiso']);
Route::patch('/permissions/{permission}', [PermissionController::class, 'update'])->middleware(['auth:sanctum', 'permission:permissions-actualizar-permiso']);
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:permissions-borrar-permiso']);
