<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StageController;
use App\Http\Controllers\Api\CampusController;
use App\Http\Controllers\Api\PeriodController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\AsTenantController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\ParallelController;
use App\Http\Controllers\Api\ClassRoomController;
use App\Http\Controllers\Api\HourhandController;
use App\Http\Controllers\Api\InstituteController;
use App\Http\Controllers\Api\InstituteTypeController;
use App\Http\Controllers\Api\PeriodStageController;
use App\Http\Controllers\Api\MatterMeshController;
use App\Http\Controllers\Api\TypePeriodController;
use App\Http\Controllers\Api\OfferController;

/* Import routes */
require __DIR__ . "/channels/roles.php";
require __DIR__ . "/channels/permissions.php";
require __DIR__ . "/channels/pensums.php";
require __DIR__ . "/channels/type-califications.php";
require __DIR__ . "/channels/type-matters.php";
require __DIR__ . "/channels/meshs.php";
require __DIR__ . "/channels/matters.php";
require __DIR__ . "/channels/mails.php";
require __DIR__ . "/channels/matter-status.php";

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
 * Reset Password
 */
Route::post('/olvidar-clave', [ForgotPasswordController::class, 'sendResetLinkResponse'])->name('passwords.send');
Route::get('/restablecer-clave/{token}', [ResetPasswordController::class, 'verifyToken'])->name('passwords.verify');
Route::post('/restablecer-clave', [ResetPasswordController::class, 'sendResetResponse'])->name('passwords.reset');
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
Route::put('/users/{user}/change/password', [UserController::class, 'changePassword'])->middleware(['auth:sanctum',  'permission:users-change-password']);
Route::get('/users/uncollaborator', [UserController::class, 'showUsersUnCollaborator'])->middleware(['auth:sanctum',  'permission:users-lista-usuario-diferente-colaborador']);
Route::get('/users', [UserController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/users/{user}', [UserController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/users', [UserController::class, 'store'])->middleware(['auth:sanctum'/* , 'permission:users-crear-usuario' */]);
Route::patch('/users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:users-actualizar-usuario' */]);
Route::put('/users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum'/* , 'permission:users-actualizar-usuario' */]);
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(['auth:sanctum'/* , 'permission:users-borrar-usuario' */]);

/**
 * UserProfiles
 */
Route::get('/users/{user}/profiles', [UserController::class, 'showProfiles'])->middleware(['auth:sanctum' , 'permission:users-listar-perfiles-usuario']);
Route::get('/users/{user}/profiles/{profile}', [UserController::class, 'showProfilesById'])->middleware(['auth:sanctum' , 'permission:users-mostrar-perfil-especifico-por-usuario']);
Route::post('/users/{user}/profiles', [UserController::class, 'saveProfiles'])->middleware(['auth:sanctum' , 'permission:users-guardar-perfil-por-usuario']);
Route::put('/users/{user}/profiles/{profile}', [UserController::class, 'updateProfileById'])->middleware(['auth:sanctum', 'permission:users-actualizar-perfil-por-usuario']);
Route::delete('/users/{user}/profiles/{profile}', [UserController::class, 'destroyProfilesById'])->middleware(['auth:sanctum' , 'permission:users-borrar-perfiles-por-usuario']);
Route::delete('/users/{user}/profiles', [UserController::class, 'destroyProfiles'])->middleware(['auth:sanctum' , 'permission:users-borrar-perfil-especifico-por-usuario']);
Route::get('/users/{user}/roles', [UserController::class, 'showRolesbyUser'])->middleware(['auth:sanctum' , 'permission:users-listar-roles-por-usuario']);
Route::get('/users/{user}/profiles/{profile}/roles', [UserController::class, 'showRolesbyUserProfile'])->middleware(['auth:sanctum' , 'permission:users-listar-roles-por-usuario-y-perfil']);
Route::post('/users/{user}/profiles/{profile}/roles', [UserController::class, 'saveRolesbyUserProfile'])->middleware(['auth:sanctum' , 'permission:users-sincronizar-roles-por-usuario-y-perfil']);


/**
 * Profiles
 */
Route::get('/profiles', [ProfileController::class, 'index'])->middleware(['auth:sanctum', 'permission:profiles-listar-perfil']);
Route::get('/profiles/{profile}', [ProfileController::class, 'show'])->middleware(['auth:sanctum', 'permission:profiles-obtener-perfil']);
Route::post('/profiles', [ProfileController::class, 'store'])->middleware(['auth:sanctum', 'permission:profiles-crear-perfil']);
Route::put('/profiles/{profile}', [ProfileController::class, 'update'])->middleware(['auth:sanctum', 'permission:profiles-actualizar-perfil']);
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:profiles-borrar-un-perfil']);
Route::get('/profiles/{profile}/users', [ProfileController::class, 'showUsers'])->middleware(['auth:sanctum', 'permission:profiles-listar-usuarios-por-perfil']);
/**
 *
 * Companies
 */
Route::get('/companies', [CompanyController::class, 'index'])->middleware(['auth:sanctum', 'permission:companies-listar-companias']);
Route::get('/companies/{company}', [CompanyController::class, 'show'])->middleware(['auth:sanctum', 'permission:companies-obtener-compania']);
Route::post('/companies', [CompanyController::class, 'store'])->middleware(['auth:sanctum', 'permission:companies-crear-compania']);
Route::patch('/companies/{company}', [CompanyController::class, 'update'])->middleware(['auth:sanctum', 'permission:companies-actualizar-compania']);
Route::put('/companies/{company}', [CompanyController::class, 'update'])->middleware(['auth:sanctum', 'permission:companies-actualizar-compania']);
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:companies-borrar-compania']);
/**
 *
 * Campus
 */
Route::get('/campus', [CampusController::class, 'index'])->middleware(['auth:sanctum', 'permission:campus-listar-sedes']);
Route::get('/campus/{campus}', [CampusController::class, 'show'])->middleware(['auth:sanctum', 'permission:campus-obtener-sede']);
Route::post('/campus', [CampusController::class, 'store'])->middleware(['auth:sanctum', 'permission:campus-crear-sede']);
Route::patch('/campus/{campus}', [CampusController::class, 'update'])->middleware(['auth:sanctum', 'permission:campus-actualizar-sede']);
Route::put('/campus/{campus}', [CampusController::class, 'update'])->middleware(['auth:sanctum', 'permission:campus-actualizar-sede']);
Route::delete('/campus/{campus}', [CampusController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:campus-borrar-sede']);

/**
 * Parallels
 */
Route::get('/parallels', [ParallelController::class, 'index'])->middleware(['auth:sanctum', 'permission:parallels-listar-paralelos']);
Route::get('/parallels/{parallel}', [ParallelController::class, 'show'])->middleware(['auth:sanctum', 'permission:parallels-obtener-paralelo']);
Route::post('/parallels', [ParallelController::class, 'store'])->middleware(['auth:sanctum', 'permission:parallels-crear-paralelo']);
Route::put('/parallels/{parallel}', [ParallelController::class, 'update'])->middleware(['auth:sanctum', 'permission:parallels-actualizar-paralelo']);
Route::post('/parallels/{parallel}/enabled', [ParallelController::class, 'enabled'])->middleware(['auth:sanctum', 'permission:parallels-activar-paralelo']);
Route::post('/parallels/{parallel}/disabled', [ParallelController::class, 'disabled'])->middleware(['auth:sanctum', 'permission:parallels-desactivar-paralelo']);
Route::delete('/parallels/{parallel}', [ParallelController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:parallels-borrar-paralelo']);

/**
 *
 * Etapas
 */
Route::get('/stages', [StageController::class, 'index'])->middleware(['auth:sanctum', 'permission:stages-listar-etapas']);
Route::get('/stages/{stage}', [StageController::class, 'show'])->middleware(['auth:sanctum', 'permission:stages-obtener-etapa']);
Route::post('/stages', [StageController::class, 'store'])->middleware(['auth:sanctum', 'permission:stages-crear-etapa']);
Route::put('/stages/{stage}', [StageController::class, 'update'])->middleware(['auth:sanctum', 'permission:stages-actualizar-etapa']);
Route::delete('/stages/{stage}', [StageController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:stages-borrar-etapa']);

/**
 *
 * Aulas
 */
Route::get('/classrooms', [ClassRoomController::class, 'index'])->middleware(['auth:sanctum', 'permission:classrooms-listar-aulas']);
Route::get('/classrooms/{classroom}', [ClassRoomController::class, 'show'])->middleware(['auth:sanctum', 'permission:classrooms-obtener-aula']);
Route::post('/classrooms', [ClassRoomController::class, 'store'])->middleware(['auth:sanctum', 'permission:classrooms-crear-aula']);
Route::put('/classrooms/{classroom}', [ClassRoomController::class, 'update'])->middleware(['auth:sanctum', 'permission:classrooms-actualizar-aula']);
Route::delete('/classrooms/{classroom}', [ClassRoomController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:classrooms-borrar-aula']);
Route::post('/classrooms/{classroom}/enabled', [ClassRoomController::class, 'enabled'])->middleware(['auth:sanctum', 'permission:classrooms-activar-aula']);
Route::post('/classrooms/{classroom}/disabled', [ClassRoomController::class, 'disabled'])->middleware(['auth:sanctum', 'permission:classrooms-desactivar-aula']);

/**
 * TypePeriods
 */
Route::get('/typePeriods', [TypePeriodController::class, 'index'])->middleware(['auth:sanctum', 'permission:typePeriods-listar-tiposPeriodos']);
Route::get('/typePeriods/{typePeriod}', [TypePeriodController::class, 'show'])->middleware(['auth:sanctum', 'permission:typePeriods-obtener-tipoPeriodo']);
Route::post('/typePeriods', [TypePeriodController::class, 'store'])->middleware(['auth:sanctum', 'permission:typePeriods-crear-tipoPeriodo']);
Route::patch('/typePeriods/{typePeriod}', [TypePeriodController::class, 'update'])->middleware(['auth:sanctum', 'permission:typePeriods-actualizar-tipoPeriodo']);
Route::put('/typePeriods/{typePeriod}', [TypePeriodController::class, 'update'])->middleware(['auth:sanctum', 'permission:typePeriods-actualizar-tipoPeriodo']);
Route::delete('/typePeriods/{typePeriod}', [TypePeriodController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:typePeriods-borrar-tipoPeriodo']);

/**
 * Periods
 */
Route::get('/periods', [PeriodController::class, 'index'])->middleware(['auth:sanctum', 'permission:periods-listar-periodos']);
Route::get('/periods/{period}', [PeriodController::class, 'show'])->middleware(['auth:sanctum', 'permission:periods-obtener-periodo']);
Route::post('/periods', [PeriodController::class, 'store'])->middleware(['auth:sanctum', 'permission:periods-crear-periodo']);
//Route::patch('/periods/{period}', [PeriodController::class, 'update'])->middleware(['auth:sanctum', 'permission:periods-actualizar-periodo']);
Route::put('/periods/{period}', [PeriodController::class, 'update'])->middleware(['auth:sanctum', 'permission:periods-actualizar-periodo']);
Route::delete('/periods/{period}', [PeriodController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:periods-borrar-periodo']);

/**
 * MatterMesh
 */
Route::get('/mattermeshs', [MatterMeshController::class, 'index'])->middleware(['auth:sanctum', 'permission:mattermesh-listar-materias-mallas']);
Route::get('/mattermeshs/{mattermesh}', [MatterMeshController::class, 'show'])->middleware(['auth:sanctum', 'permission:mattermesh-obtener-materias-mallas']);
Route::post('/mattermeshs', [MatterMeshController::class, 'store'])->middleware(['auth:sanctum', 'permission:mattermesh-crear-materias-mallas']);
Route::put('/mattermeshs/{mattermesh}', [MatterMeshController::class, 'update'])->middleware(['auth:sanctum', 'permission:mattermesh-actualizar-materias-mallas']);
Route::delete('/mattermeshs/{mattermesh}', [MatterMeshController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:mattermesh-borrar-materias-mallas']);

/*
 *
 * PeriodStages
 */
Route::get('/periodstages', [PeriodStageController::class, 'index'])->middleware(['auth:sanctum', 'permission:periodStages-listar-periodoEtapa']);
Route::get('/periodstages/{periodstage}', [PeriodStageController::class, 'show'])->middleware(['auth:sanctum', 'permission:periodStages-obtener-periodoEtapa']);
Route::post('/periodstages', [PeriodStageController::class, 'store'])->middleware(['auth:sanctum', 'permission:periodStages-crear-periodoEtapa']);
Route::put('/periodstages/{periodstage}', [PeriodStageController::class, 'update'])->middleware(['auth:sanctum', 'permission:periodStages-actualizar-periodoEtapa']);
Route::delete('/periodstages/{periodstage}', [PeriodStageController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:periodStages-borrar-periodoEtapa']);

/*
 * Offers
 */
Route::get('/offers', [OfferController::class, 'index'])->middleware(['auth:sanctum', 'permission:offers-listar-ofertas']);
Route::get('/offers/{offer}', [OfferController::class, 'show'])->middleware(['auth:sanctum', 'permission:offers-obtener-oferta']);
Route::post('/offers', [OfferController::class, 'store'])->middleware(['auth:sanctum', 'permission:offers-crear-oferta']);
Route::patch('/offers/{offer}', [OfferController::class, 'update'])->middleware(['auth:sanctum', 'permission:offers-actualizar-oferta']);
Route::put('/offers/{offer}', [OfferController::class, 'update'])->middleware(['auth:sanctum', 'permission:offers-actualizar-oferta']);
Route::delete('/offers/{offer}', [OfferController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:offers-borrar-oferta']);

/**
 * Periodo Oferta
 */
Route::get('/offers/{offer}/periods', [OfferController::class, 'showPeriodsByOffer'])->middleware(['auth:sanctum', 'permission:offerPeriod-listar-periodos-por-oferta']);
Route::get('/offers/{offer}/periods/{period}', [OfferController::class, 'showPeriodByOffer'])->middleware(['auth:sanctum', 'permission:offerPeriod-obtener-periodo-por-oferta']);
Route::post('/offers/{offer}/periods', [OfferController::class, 'saveOfferPeriod'])->middleware(['auth:sanctum', 'permission:offerPeriod-crear-periodo-por-oferta']);
Route::put('/offers/{offer}/periods/{period}', [OfferController::class, 'updateOfferPeriod'])->middleware(['auth:sanctum', 'permission:offerPeriod-actualizar-periodo-por-oferta']);
Route::delete('/offers/{offer}/periods/{period}', [OfferController::class, 'destroyOfferPeriod'])->middleware(['auth:sanctum', 'permission:offerPeriod-borrar-periodo-por-oferta']);
Route::delete('/offers/{offer}/periods', [OfferController::class, 'destroyOfferPeriods'])->middleware(['auth:sanctum', 'permission:offerPeriod-borrar-periodos-por-oferta']);
/**
 * Oferta Periodo
 */
Route::get('/periods/{period}/offers', [PeriodController::class, 'showOffersByPeriod'])->middleware(['auth:sanctum', 'permission:PeriodOffer-listar-ofertas-por-periodo']);
Route::delete('/periods/{period}/offers', [PeriodController::class, 'destroyOffersByPeriod'])->middleware(['auth:sanctum', 'permission:PeriodOffer-borrar-ofertas-por-periodo']);

/*
 * Hourhand
 */
Route::get('/hourhands', [HourhandController::class, 'index'])->middleware(['auth:sanctum', 'permission:hourhands-listar-horarios']);
Route::get('/hourhands/{hourhand}', [HourhandController::class, 'show'])->middleware(['auth:sanctum', 'permission:hourhands-obtener-horario']);
Route::post('/hourhands', [HourhandController::class, 'store'])->middleware(['auth:sanctum', 'permission:hourhands-crear-horario']);
Route::put('/hourhands/{hourhand}', [HourhandController::class, 'update'])->middleware(['auth:sanctum', 'permission:hourhands-actualizar-horario']);
Route::delete('/hourhands/{hourhand}', [HourhandController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:hourhands-borrar-horario']);
/**
 * Tipos de Instituto
 */
Route::get('institutetypes', [InstituteTypeController::class, 'index'])->middleware(['auth:sanctum', 'permission:institutetype-listar-tipos-de-institutos']);
Route::post('institutetypes', [InstituteTypeController::class, 'store'])->middleware(['auth:sanctum', 'permission:institutetype-crear-tipo-de-instituto']);
Route::get('institutetypes/{institutetype}', [InstituteTypeController::class, 'show'])->middleware(['auth:sanctum', 'permission:institutetype-obtener-tipo-de-instituto']);
Route::put('institutetypes/{institutetype}', [InstituteTypeController::class, 'update'])->middleware(['auth:sanctum', 'permission:institutetype-actualizar-tipo-de-instituto']);
Route::delete('institutetypes/{institutetype}', [InstituteTypeController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:institutetype-eliminar-tipo-de-instituto']);
/**
 * Institutos
 */
Route::get('institutes', [InstituteController::class, 'index'])->middleware(['auth:sanctum', 'permission:institutes-listar-institutos']);
Route::post('institutes', [InstituteController::class, 'store'])->middleware(['auth:sanctum', 'permission:institutes-crear-instituto']);
Route::get('institutes/{institute}', [InstituteController::class, 'show'])->middleware(['auth:sanctum', 'permission:institutes-obtener-instituto']);
Route::put('institutes/{institute}', [InstituteController::class, 'update'])->middleware(['auth:sanctum', 'permission:institutes-actualizar-instituto']);
Route::delete('institutes/{institute}', [InstituteController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:institutes-eliminar-instituto']);
