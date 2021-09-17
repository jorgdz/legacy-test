<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentDocumentController;
use Illuminate\Http\Response;

Route::get('/student-document', [StudentDocumentController::class, 'index'])->middleware(['auth:sanctum', 'permission:student-document-listar-documentos-estudiantes']);
Route::get('/student-document/{id}', [StudentDocumentController::class, 'show'])->middleware(['auth:sanctum', 'permission:student-document-obtener-documento-estudiante']);
Route::post('/student-document', [StudentDocumentController::class, 'store'])->middleware(['auth:sanctum', 'permission:student-document-crear-documento-estudiante']);
Route::put('/student-document/{studentDocument}', [StudentDocumentController::class, 'update'])->middleware(['auth:sanctum', 'permission:student-document-actualizar-documento-estudiante']);
Route::delete('/student-document/{studentDocument}', [StudentDocumentController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:student-document-borrar-documento-estudiante']);
Route::get('/student-document/download/{filename}', [StudentDocumentController::class, 'download'])->middleware(['auth:sanctum', 'permission:student-document-descargar-documentos-estudiantes']);
