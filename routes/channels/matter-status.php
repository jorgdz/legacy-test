<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MatterStatusController;

Route::get('/matter-status', [MatterStatusController::class, 'index'])->middleware(['auth:sanctum', /* 'permission:matter-status-listar-matter-status' */]);
Route::get('/matter-status/{id}', [MatterStatusController::class, 'show'])->middleware(['auth:sanctum', /* 'permission:matter-status-obtener-matter-status' */]);
Route::post('/matter-status', [MatterStatusController::class, 'store'])->middleware(['auth:sanctum', /* 'permission:matter-status-crear-matter-status' */]);
Route::put('/matter-status/{matterStatus}', [MatterStatusController::class, 'update'])->middleware(['auth:sanctum', /* 'permission:matter-status-actualizar-matter-status' */]);
Route::patch('/matter-status/{matterStatus}', [MatterStatusController::class, 'update'])->middleware(['auth:sanctum', /* 'permission:matter-status-actualizar-matter-status' */]);
Route::delete('/matter-status/{matterStatus}', [MatterStatusController::class, 'destroy'])->middleware(['auth:sanctum', /* 'permission:matter-status-borrar-matter-status' */]);
