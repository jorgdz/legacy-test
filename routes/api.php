<?php

use Illuminate\Http\Request;
use App\Mail\EmailInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfileController;

/* import routes */
require __DIR__ . "/channels/roles.php";
require __DIR__ . "/channels/permissions.php";

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
*
*==============================Tenants routes==================================
*/

/**
 *
 * Login
 */
Route::post('/login', [AuthController::class, 'login']);

/**
 *
 * Current tenant
 */
Route::get('/as-tenant', function () {
    $key = request()->url().'_as_current_tenant';

    return Cache::remember($key, now()->addMinutes(150), function () {
        return response()->json([
            'name' => app('currentTenant')->name,
            'domain' => app('currentTenant')->domain
        ]);
    });
});

/**
 * User auth "whoami"
 */
Route::get('/whoami', [AuthController::class, 'whoami'])->middleware('auth:sanctum');

/**
 *
 * Logout
 */
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

/**
 * Users
 */
Route::get('/users', [UserController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/users/{user}', [UserController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/users', [UserController::class, 'store'])->middleware(['auth:sanctum']);

Route::post('/send-mail', function (Request $request) {
    Mail::to($request->email)->send(new EmailInvitation());
    return response()->json([
        'info' => "Invitación enviada a {$request->email}"
    ]);
})->middleware(['auth:sanctum']);


/**
 * Profiles
 */
Route::get('/profiles', [ProfileController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/profiles', [ProfileController::class, 'store'])->middleware(['auth:sanctum']);
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->middleware(['auth:sanctum']);

Route::apiResource('companies', CompanyController::class)->middleware(['auth:sanctum']);