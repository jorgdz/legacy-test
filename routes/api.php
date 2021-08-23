<?php

use Illuminate\Http\Request;
use App\Mail\EmailInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PermissionController;
use App\Models\User;

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
 * Files
 */
Route::apiResource('files', FileController::class)
    ->middleware(['auth:api', 'permission:upload_files']);

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
Route::get('/whoami', function (Request $request) {
    $key = request()->url();

    return Cache::remember($key, now()->addMinutes(150), function () use ($request) {
        return $request->user();
    });
})->middleware('auth:api');

/**
 *
 * Logout
 */
Route::post('/logout', function (Request $request) {
    Cache::flush();

    $request->user()->token()->revoke();
    return response()->json(['message' => 'Good by user.']);
})->middleware('auth:api');

/**
 * Users
 */
Route::get('/users', [UserController::class, 'index'])->middleware(['auth:api', 'permission:list_users']);
Route::get('/users/{user}', [UserController::class, 'show'])->middleware(['auth:api']);
Route::post('/users', [UserController::class, 'store'])->middleware(['auth:api']);

/**
 *
 * Roles
 */
Route::apiResource('roles', RoleController::class)->middleware('auth:api');

/**
 *
 * Permissions
 */
Route::apiResource('permissions', PermissionController::class)->middleware('auth:api');

Route::post('/send-mail', function (Request $request) {
    Mail::to($request->email)->send(new EmailInvitation());
    return response()->json([
        'info' => "Invitación enviada a {$request->email}"
    ]);
})->middleware(['auth:api', 'permission:send_mail']);
