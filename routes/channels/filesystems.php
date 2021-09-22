<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileSystemController;

Route::get('/show', [FileSystemController::class, 'showFile'])->middleware(['auth:sanctum']);
Route::get('/download', [FileSystemController::class, 'downloadFile'])->middleware(['auth:sanctum']);
/* Route::post('/upload', [FileSystemController::class, 'uploadFile'])->middleware(['auth:sanctum']); */