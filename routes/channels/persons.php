<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonController;

Route::get('/persons', [PersonController::class, 'index'])->middleware(['auth:sanctum'/* , 'permission:persons-listar-persons' */]);
Route::get('/persons/{id}', [PersonController::class, 'show'])->middleware(['auth:sanctum'/* , 'permission:persons-obtener-person' */]);
Route::post('/persons', [PersonController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:persons-crear-person' */]);
Route::put('/persons/{person}', [PersonController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:persons-actualizar-person' */]);
Route::patch('/persons/{person}', [PersonController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:persons-actualizar-person' */]);
Route::delete('/persons/{person}', [PersonController::class, 'destroy'])->middleware(['auth:sanctum'/* , 'permission:roles-borrar-person' */]);
