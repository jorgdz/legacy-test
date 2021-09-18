<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeStudentProgramsController;
use Illuminate\Http\Response;

Route::get('/type-student-program', [TypeStudentProgramsController::class, 'index'])->middleware(['auth:sanctum',/*  'permission:type-student-program-listar-tipo-programa-estudiante' */]);
Route::get('/type-student-program/{id}', [TypeStudentProgramsController::class, 'show'])->middleware(['auth:sanctum', /* 'permission:type-student-program-obtener-tipo-programa-estudiante' */]);
Route::post('/type-student-program', [TypeStudentProgramsController::class, 'store'])->middleware(['auth:sanctum', /* 'permission:type-student-program-crear-tipo-programa-estudiante' */]);
Route::put('/type-student-program/{typeStudentProgram}', [TypeStudentProgramsController::class, 'update'])->middleware(['auth:sanctum', /* 'permission:type-student-program-actualizar-tipo-programa-estudiante' */]);
Route::delete('/type-student-program/{typeStudentProgram}', [TypeStudentProgramsController::class, 'destroy'])->middleware(['auth:sanctum', /* 'permission:type-student-program-borrar-tipo-programa-estudiante' */]);
