<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatalogController;


Route::middleware(['external'])->group(function () {
    /**
     * Catalogs
     */
    Route::get('/catalogs/{catalog:keyword}/children-keywork', [CatalogController::class, 'getChildrenByKeywork']);
});
