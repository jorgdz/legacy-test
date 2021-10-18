<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExternalHomologationApplicationController;

Route::post('/applications-external-homologations', [ExternalHomologationApplicationController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:applications-external-homologations-crear-solicitud-homologacion-externa' */]);
