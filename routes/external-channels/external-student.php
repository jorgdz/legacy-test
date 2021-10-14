<?php

use App\Http\Controllers\ApiExternal\ExternalStudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('external')->middleware(['external-student'])->group(function () {
    Route::post('/students', [ExternalStudentController::class, 'store']);
    Route::post('/student-storage-file', [ExternalStudentController::class, 'StorageFile']);
});
