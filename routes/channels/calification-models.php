<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CalificationModelController;
use Illuminate\Http\Response;

Route::get('/calification-models', [CalificationModelController::class, 'index'])->middleware(['auth:sanctum', /* 'permission:calification-models-listar-modelo-calificacion' */]);
Route::get('/calification-models/{id}', [CalificationModelController::class, 'show'])->middleware(['auth:sanctum',/*  'permission:calification-models-obtener-modelo-calificacion' */]);
Route::post('/calification-models', [CalificationModelController::class, 'store'])->middleware(['auth:sanctum', /* 'permission:calification-models-crear-modelo-calificacion' */]);
Route::put('/calification-models/{calificationModel}', [CalificationModelController::class, 'update'])->middleware(['auth:sanctum',/*  'permission:calification-models-actualizar-modelo-calificacion' */]);
Route::delete('/calification-models/{calificationModel}', [CalificationModelController::class, 'destroy'])->middleware(['auth:sanctum',/*  'permission:calification-models-borrar-modelo-calificacion' */]);
