<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExternalHomologationApplicationController;
use App\Http\Controllers\Api\TeacherRequisitionApplicationController;

Route::post('/applications-external-homologations', [ExternalHomologationApplicationController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:applications-external-homologations-crear-solicitud-homologacion-externa' */]);

Route::post('/applications/teacher-requisition', [TeacherRequisitionApplicationController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:applications-external-homologations-crear-solicitud-homologacion-externa' */]);
Route::post('/teacher-requisition/change-status', [TeacherRequisitionApplicationController::class, 'changeApplicationStatus'])->middleware(['auth:sanctum', 'permission:application-actualizar-solicitudes']);
