<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExampleTestingController;

Route::post('/send-testing-email', [ExampleTestingController::class, 'SendEmailExample']);
