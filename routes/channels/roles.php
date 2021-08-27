<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoleController;

/* TODO: pending add middleware permission:[name_middleware]  */

Route::get('/roles', [RoleController::class, 'index'])->middleware(['auth:sanctum', 'permission:Listar roles']);
Route::get('/roles/{id}', [RoleController::class, 'show'])->middleware(['auth:sanctum', 'permission:Obtener un rol']);
Route::post('/roles', [RoleController::class, 'store'])->middleware(['auth:sanctum', 'permission:Crear un rol']);
Route::put('/roles/{role}', [RoleController::class, 'update'])->middleware(['auth:sanctum', 'permission:Actualizar un rol']);
Route::patch('/roles/{role}', [RoleController::class, 'update'])->middleware(['auth:sanctum', 'permission:Actualizar un rol']);
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:Borrar un rol']);
