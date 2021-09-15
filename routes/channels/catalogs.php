<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatalogController;

Route::get('/catalogs', [CatalogController::class, 'index'])->middleware(['auth:sanctum'/* , 'permission:catalogs-listar-catalogs' */]);
Route::get('/catalogs/{id}', [CatalogController::class, 'show'])->middleware(['auth:sanctum'/* , 'permission:catalogs-obtener-catalog' */]);
Route::post('/catalogs', [CatalogController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:catalogs-crear-catalog' */]);
Route::put('/catalogs/{catalog}', [CatalogController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:catalogs-actualizar-catalog' */]);
Route::patch('/catalogs/{catalog}', [CatalogController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:catalogs-actualizar-catalog' */]);
Route::delete('/catalogs/{catalog}', [CatalogController::class, 'destroy'])->middleware(['auth:sanctum'/* , 'permission:catalogs-borrar-catalog' */]);
