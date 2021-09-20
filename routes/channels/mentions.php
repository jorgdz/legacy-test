<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MentionController;

Route::get('/mention', [MentionController::class, 'index'])->middleware(['auth:sanctum', 'permission:mention-listar-menciones']);
Route::get('/mention/{id}', [MentionController::class, 'show'])->middleware(['auth:sanctum', 'permission:mention-obtener-mencion']);
