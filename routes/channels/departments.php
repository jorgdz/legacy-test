<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DepartmentController;

Route::get('/departments', [DepartmentController::class, 'index'])->middleware(['auth:sanctum',  /*'permission:departments-listar-departamentos' */]);
Route::get('/departments/{id}', [DepartmentController::class, 'show'])->middleware(['auth:sanctum',  /*'permission:departments-obtener-departamento' */]);
Route::post('/departments', [DepartmentController::class, 'store'])->middleware(['auth:sanctum',  /*'permission:departments-crear-departamento' */]);
Route::put('/departments/{department}', [DepartmentController::class, 'update'])->middleware(['auth:sanctum', /* 'permission:departments-actualizar-departamento' */]);
Route::put('/departments/{department}/status', [DepartmentController::class, 'updateStatus'])->middleware(['auth:sanctum', /* 'permission:departments-actualizar-estado-departamento' */]);
