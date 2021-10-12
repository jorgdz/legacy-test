<?php

use App\Http\Controllers\ApiExternal\ExternalStudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['external-student'])->group(function () {
    Route::post('external/students', [ExternalStudentController::class, 'store']);
   
});