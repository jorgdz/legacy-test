<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonController;

Route::get('/persons', [PersonController::class, 'index'])->middleware(['auth:sanctum', 'permission:persons-listar-persons']);
Route::get('/persons/{id}', [PersonController::class, 'show'])->middleware(['auth:sanctum', 'permission:persons-obtener-person']);
Route::post('/persons', [PersonController::class, 'store'])->middleware(['auth:sanctum', 'permission:persons-crear-person']);
Route::post('persons/{person}/jobs', [PersonController::class, 'assignJobs'])->middleware(['auth:sanctum', 'permission:persona-asignar-trabajos-persona']);
Route::post('persons/{person}/languages', [PersonController::class, 'updateLanguagePerson'])->middleware(['auth:sanctum', 'permission:languages-person-actualizar-lenguajes-por-persona']);
Route::put('/persons/{person}', [PersonController::class, 'update'])->middleware(['auth:sanctum', 'permission:persons-actualizar-person']);
Route::patch('/persons/{person}', [PersonController::class, 'update'])->middleware(['auth:sanctum', 'permission:persons-actualizar-person']);
Route::get('/persons/{person}/relatives', [PersonController::class, 'showRelativeByPerson'])->middleware(['auth:sanctum', 'permission:relatives-obtener-familiar-por-estudiante']);
Route::delete('/persons/{person}', [PersonController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:persons-borrar-person']);

