<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentRecordPeriodController;

Route::get('/student-records-period', [StudentRecordPeriodController::class, 'index'])->middleware(['auth:sanctum'/* , 'permission:student-records-period-listar-student-records-period' */]);
Route::get('/student-records-period/{id}', [StudentRecordPeriodController::class, 'show'])->middleware(['auth:sanctum'/* , 'permission:student-records-period-obtener-student-record-period' */]);
Route::post('/student-records-period', [StudentRecordPeriodController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:student-records-period-crear-student-record-period' */]);
Route::put('/student-records-period/{studentRecordPeriod}', [StudentRecordPeriodController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:student-records-period-actualizar-student-record-period' */]);
Route::patch('/student-records-period/{studentRecordPeriod}', [StudentRecordPeriodController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:student-records-period-actualizar-student-record-period' */]);
Route::delete('/student-records-period/{studentRecordPeriod}', [StudentRecordPeriodController::class, 'destroy'])->middleware(['auth:sanctum'/* , 'permission:student-records-period-borrar-student-record-period' */]);
