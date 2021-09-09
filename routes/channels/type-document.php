<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TypeDocumentController;

Route::get('/type-document', [TypeDocumentController::class, 'index'])->middleware(['auth:sanctum', 'permission:type-document-listar-tipo-documento']);
Route::get('/type-document/{id}', [TypeDocumentController::class, 'show'])->middleware(['auth:sanctum', 'permission:type-document-obtener-tipo-documento']);
Route::post('/type-document', [TypeDocumentController::class, 'store'])->middleware(['auth:sanctum', 'permission:type-document-crear-tipo-documento']);
Route::put('/type-document/{typeDocument}', [TypeDocumentController::class, 'update'])->middleware(['auth:sanctum', 'permission:type-document-actualizar-tipo-documento']);
Route::delete('/type-document/{typeDocument}', [TypeDocumentController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:type-document-borrar-tipo-tipo']);
