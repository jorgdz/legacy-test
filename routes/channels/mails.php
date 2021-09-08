<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MailController;

Route::get('/mails', [MailController::class, 'index'])->middleware(['auth:sanctum', 'permission:mails-listar-mails']);
Route::get('/mails/{id}', [MailController::class, 'show'])->middleware(['auth:sanctum', 'permission:mails-obtener-mail']);
Route::put('/mails/{mail}', [MailController::class, 'update'])->middleware(['auth:sanctum', 'permission:mails-actualizar-mail']);
Route::patch('/mails/{mail}', [MailController::class, 'update'])->middleware(['auth:sanctum', 'permission:mails-actualizar-mail']);