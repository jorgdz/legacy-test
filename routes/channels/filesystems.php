<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileSystemController;

Route::get('/show', [FileSystemController::class, 'showFile'])->middleware([]);
Route::get('/download', [FileSystemController::class, 'downloadFile'])->middleware([]);
/* Route::post('/upload', [FileSystemController::class, 'uploadFile'])->middleware([]); */