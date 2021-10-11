<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\InstituteController;
use App\Http\Controllers\Api\EducationLevelController;

Route::prefix('external')->middleware(['external'])->group(function () {
    /**
     * Catalogs
     */
    Route::get('/catalogs/{catalog:keyword}/children-keywork', [CatalogController::class, 'getChildrenByKeywork']);

    /**
     * Institutes
     */
    Route::get('/institutes/{id}/province', [InstituteController::class, 'searchInstituteByProvince']);
    Route::get('/institutes', [InstituteController::class, 'searchHigherInstitutes']);

    /**
     * Educational levels
     */
    Route::get('/education-levels/parents', [EducationLevelController::class, 'getOnlyParents']);
    Route::get('/education-levels/{id}', [EducationLevelController::class, 'show']);
});
