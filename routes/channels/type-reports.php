<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeReportsController;

Route::get('/type-reports', [TypeReportsController::class, 'index'])->middleware(['auth:sanctum'/* , 'permission:type-reports-listar-type-reports' */]);
Route::get('/type-reports/{id}', [TypeReportsController::class, 'show'])->middleware(['auth:sanctum'/* , 'permission:type-reports-obtener-type-report' */]);
Route::post('/type-reports', [TypeReportsController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:type-reports-crear-type-report' */]);
Route::put('/type-reports/{typeReport}', [TypeReportsController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:type-reports-actualizar-type-report' */]);
Route::patch('/type-reports/{typeReport}', [TypeReportsController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:type-reports-actualizar-type-report' */]);
Route::delete('/type-reports/{typeReport}', [TypeReportsController::class, 'destroy'])->middleware(['auth:sanctum'/* , 'permission:type-reports-borrar-type-report' */]);
