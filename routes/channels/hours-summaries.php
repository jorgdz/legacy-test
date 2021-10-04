<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HourSummaryController;

Route::get('/hours-summaries', [HourSummaryController::class, 'index'])->middleware(['auth:sanctum', /* 'permission:hours-summaries-listar-resumen-horas-colaborador' */]);
Route::get('/hours-summaries/{id}', [HourSummaryController::class, 'show'])->middleware(['auth:sanctum', /* 'permission:hours-summaries-obtener-resumen-horas-colaborador' */]);
Route::post('/hours-summaries', [HourSummaryController::class, 'store'])->middleware(['auth:sanctum', /* 'permission:hours-summaries-crear-resumen-horas-colaborador' */]);
Route::put('/hours-summaries/{hourSummary}', [HourSummaryController::class, 'update'])->middleware(['auth:sanctum', /* 'permission:hours-summaries-actualizar-resumen-horas-colaborador' */]);
Route::delete('/hours-summaries/{hourSummary}', [HourSummaryController::class, 'destroy'])->middleware(['auth:sanctum', /* 'permission:hours-summaries-borrar-resumen-horas-colaborador' */]);
