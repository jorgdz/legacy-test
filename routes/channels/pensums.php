<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PensumController;

Route::get('/pensums', [PensumController::class, 'index'])->middleware(['auth:sanctum', 'permission:pensums-listar-pensums']);
Route::get('/pensums/{id}', [PensumController::class, 'show'])->middleware(['auth:sanctum', 'permission:pensums-obtener-pensum']);
Route::post('/pensums', [PensumController::class, 'store'])->middleware(['auth:sanctum', 'permission:pensums-crear-pensum']);
Route::put('/pensums/{pensum}', [PensumController::class, 'update'])->middleware(['auth:sanctum', 'permission:pensums-actualizar-pensum']);
Route::patch('/pensums/{pensum}', [PensumController::class, 'update'])->middleware(['auth:sanctum', 'permission:pensums-actualizar-pensum']);
Route::delete('/pensums/{pensum}', [PensumController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:pensums-borrar-pensum']);
