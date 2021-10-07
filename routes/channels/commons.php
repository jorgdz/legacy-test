<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatalogController;
use App\Http\Controllers\Api\InstituteController;

Route::prefix('external')->middleware(['external'])->group(function () {
    /**
     * Catalogs
     */
    Route::get('/catalogs/{catalog:keyword}/children-keywork', [CatalogController::class, 'getChildrenByKeywork']);

    /**
     * Institutes
     */
    Route::get('/institutes/{id}/province', [InstituteController::class, 'searchInstituteByProvince']);
});
