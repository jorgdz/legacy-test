<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentRecordProgramsController;
use Illuminate\Http\Response;

Route::get('/student-record-programs', [StudentRecordProgramsController::class, 'index'])->middleware(['auth:sanctum',/*  'permission:student-record-programs-listar-programas-registro-estudiantil ' */]);
//Route::get('/student-records/{studentRecordProgram}/type-student-programs1', [StudentRecordProgramsController::class, 'listStudentRecordProgramAndTypeStudentPrograms'])->middleware(['auth:sanctum',/*  'permission:student_records_list_student_record_program-listar-programa-registro-estudiantil' */]);

Route::get('/student-record-programs/{id}', [StudentRecordProgramsController::class, 'show'])->middleware(['auth:sanctum', /* 'permission:student-record-programs-obtener-programa-registro-estudiantil ' */]);
Route::post('/student-record-programs', [StudentRecordProgramsController::class, 'store'])->middleware(['auth:sanctum', /* 'permission:student-record-programs-crear-programa-registro-estudiantil ' */]);
Route::put('/student-record-programs/{studentRecordProgram}', [StudentRecordProgramsController::class, 'update'])->middleware(['auth:sanctum', /* 'permission:student-record-programs-actualizar-programa-registro-estudiantil ' */]);
Route::delete('/student-record-programs/{studentRecordProgram}', [StudentRecordProgramsController::class, 'destroy'])->middleware(['auth:sanctum', /* 'permission:student-record-programs-borrar-programa-registro-estudiantil ' */]);
