<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InstitutionSubjectController;

Route::get('/institution-subjects', [InstitutionSubjectController::class, 'index'])->middleware(['auth:sanctum'/* , 'permission:institution-subjects-listar-materias-institucion' */]);
Route::get('/institution-subjects/{id}', [InstitutionSubjectController::class, 'show'])->middleware(['auth:sanctum'/* , 'permission:institution-subjects-obtener-materia-institucion' */]);
Route::post('/institution-subjects', [InstitutionSubjectController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:institution-subjects-crear-materia-institucion' */]);
Route::put('/institution-subjects/{institutionSubject}', [InstitutionSubjectController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:institution-subjects-actualizar-materia-institucion' */]);
Route::patch('/institution-subjects/{institutionSubject}', [InstitutionSubjectController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:institution-subjects-actualizar-materia-institucion' */]);
Route::delete('/institution-subjects/{institutionSubject}', [InstitutionSubjectController::class, 'destroy'])->middleware(['auth:sanctum'/* , 'permission:institution-subjects-borrar-materia-institucion' */]);
