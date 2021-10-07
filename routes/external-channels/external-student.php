<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\External\ExternalStudentController;



Route::middleware(['external-student'])->group(function () {
    Route::post('external/students', [ExternalStudentController::class, 'store']);
    // /**
    //  * Catalogs
    //  */
    // Route::get('/catalogs/{catalog:acronym}/children', [CatalogController::class, 'getChildren']);
});