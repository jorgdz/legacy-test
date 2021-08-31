<?php

use App\Http\Controllers\Api\AsTenantController;
use Illuminate\Http\Request;
use App\Mail\EmailInvitation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CampusController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserProfileController;

/* Import routes */
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
Route::get('/as-tenant', [AsTenantController::class, 'asTenant']);

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

/**
 * UserProfiles
 */
Route::get('/users/{user}/profiles', [UserController::class, 'showProfiles'])->middleware(['auth:sanctum' , 'permission:Listar perfiles por usuario']);
Route::get('/users/{user}/profiles/{profile}', [UserController::class, 'showProfilesById'])->middleware(['auth:sanctum' , 'permission:Mostrar perfil específico por usuario']);
Route::post('/users/{user}/profiles', [UserController::class, 'saveProfiles'])->middleware(['auth:sanctum' , 'permission:Guardar perfil por usuario']);
Route::put('/users/{user}/profiles/{profile}', [UserController::class, 'updateProfileById'])->middleware(['auth:sanctum', 'permission:Actualizar perfil por usuario']);
Route::delete('/users/{user}/profiles/{profile}', [UserController::class, 'destroyProfilesById'])->middleware(['auth:sanctum' , 'permission:Borrar perfiles por usuario']);
Route::delete('/users/{user}/profiles', [UserController::class, 'destroyProfiles'])->middleware(['auth:sanctum' , 'permission:Borrar perfil específico por usuario']);

/**
 * UserProfiles
 */
Route::get('/users/{user}/roles', [UserController::class, 'showRolesbyUser'])->middleware(['auth:sanctum' , 'permission:Listar roles por usuario']);
Route::get('/users/{user}/profiles/{profile}/roles', [UserController::class, 'showRolesbyUserProfile'])->middleware(['auth:sanctum' , 'permission:Listar roles por usuario y perfil']);
Route::post('/users/{user}/profiles/{profile}/roles', [UserController::class, 'saveRolesbyUserProfile'])->middleware(['auth:sanctum' , 'permission:Sincronizar roles por usuario y perfil']);

/**
 * Profiles
 */
Route::get('/profiles', [ProfileController::class, 'index'])->middleware(['auth:sanctum', 'permission:Listar perfil']);
Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/profiles', [ProfileController::class, 'store'])->middleware(['auth:sanctum', 'permission:Crear perfil']);
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->middleware(['auth:sanctum', 'permission:Actualizar perfil']);
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:Borrar un perfil']);
Route::get('/profiles/{profile}/users', [ProfileController::class, 'showUsers'])->middleware(['auth:sanctum', 'permission:Listar usuarios por perfil']);
/**
 *
 * Companies
 */
Route::apiResource('companies', CompanyController::class)->middleware(['auth:sanctum', 'permission:Mantenimiento de compañias']);

/**
 *
 * Campus
 */
Route::apiResource('campus', CampusController::class)->middleware(['auth:sanctum', 'permission:Mantenimiento de sedes']);
