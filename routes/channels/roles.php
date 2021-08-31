<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;

Route::get('/roles', [RoleController::class, 'index'])->middleware(['auth:sanctum', 'permission:roles-listar-roles']);
Route::get('/roles/{id}', [RoleController::class, 'show'])->middleware(['auth:sanctum', 'permission:roles-obtener-rol']);
Route::post('/roles', [RoleController::class, 'store'])->middleware(['auth:sanctum', 'permission:roles-crear-rol']);
Route::put('/roles/{role}', [RoleController::class, 'update'])->middleware(['auth:sanctum', 'permission:roles-actualizar-rol']);
Route::patch('/roles/{role}', [RoleController::class, 'update'])->middleware(['auth:sanctum', 'permission:roles-actualizar-rol']);
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:roles-borrar-rol']);
