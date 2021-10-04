<?php

use App\Http\Controllers\Api\AgreementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\StageController;
use App\Http\Controllers\Api\CampusController;
use App\Http\Controllers\Api\PeriodController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\TenantController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\AsTenantController;
use App\Http\Controllers\Api\HourhandController;
use App\Http\Controllers\Api\ParallelController;
use App\Http\Controllers\Api\BloodTypeController;
use App\Http\Controllers\Api\ClassRoomController;
use App\Http\Controllers\Api\InstituteController;
use App\Http\Controllers\Api\PersonJobController;
use App\Http\Controllers\Api\SubjectCurriculumController;
use App\Http\Controllers\Api\TagStudentController;
use App\Http\Controllers\Api\TypePeriodController;
use App\Http\Controllers\Api\PeriodStageController;
use App\Http\Controllers\Api\TypeStudentController;
use App\Http\Controllers\Api\EconomicGroupController;
use App\Http\Controllers\Api\InstituteTypeController;
use App\Http\Controllers\Api\StudentRecordController;
use App\Http\Controllers\Api\TypeEducationController;
use App\Http\Controllers\Api\TypeDisabilityController;
use App\Http\Controllers\Api\EmergencyContactController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\CategoryStatusController;
use App\Http\Controllers\Api\ClassroomTypeController;
use App\Http\Controllers\Api\CriteriaStudentRecordController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\RelativeController;
use App\Http\Controllers\Api\ComponentController;
use App\Http\Controllers\Api\DetailSubjectCurriculumController;
use App\Http\Controllers\Api\LearningComponentController;
use App\Http\Controllers\Api\SimbologyController;
use App\Http\Controllers\Api\ClassroomEducationLevelController;


/* Import routes */

require __DIR__ . "/channels/roles.php";
require __DIR__ . "/channels/permissions.php";
require __DIR__ . "/channels/pensums.php";
require __DIR__ . "/channels/type-califications.php";
require __DIR__ . "/channels/type-subjects.php";
require __DIR__ . "/channels/curriculums.php";
require __DIR__ . "/channels/subjects.php";
require __DIR__ . "/channels/mails.php";
require __DIR__ . "/channels/subject-status.php";
require __DIR__ . "/channels/education-levels.php";
require __DIR__ . "/channels/type-document.php";
require __DIR__ . "/channels/persons.php";
require __DIR__ . "/channels/catalogs.php";
require __DIR__ . "/channels/student-documents.php";
require __DIR__ . "/channels/mentions.php";
require __DIR__ . "/channels/type-student-programs.php";
require __DIR__ . "/channels/filesystems.php";
require __DIR__ . "/channels/student-records-period.php";
require __DIR__ . "/channels/student-record-programs.php";
require __DIR__ . "/channels/calification-models.php";
require __DIR__ . "/channels/areas.php";
require __DIR__ . "/channels/departments.php";
require __DIR__ . "/channels/collaborators.php";



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
Route::post('/logout/all-devices', [AuthController::class, 'logout_all_devices'])->middleware('auth:sanctum');

/**
 * Users
 */
Route::put('/users/{user}/change/password', [UserController::class, 'changePassword'])->middleware(['auth:sanctum',  'permission:users-change-password']);
Route::get('/users/uncollaborator', [UserController::class, 'showUsersUnCollaborator'])->middleware(['auth:sanctum',  'permission:users-lista-usuario-diferente-colaborador']);
Route::get('/users', [UserController::class, 'index'])->middleware(['auth:sanctum', 'permission:users-listar-usuarios']);
Route::get('/users/{user}', [UserController::class, 'show'])->middleware(['auth:sanctum', 'permission:users-obtener-usuario']);
Route::post('/users', [UserController::class, 'store'])->middleware(['auth:sanctum', 'permission:users-crear-usuario']);
Route::patch('/users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'permission:users-actualizar-usuario']);
Route::put('/users/{user}', [UserController::class, 'update'])->middleware(['auth:sanctum', 'permission:users-actualizar-usuario']);
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:users-borrar-usuario']);

/**
 * UserProfiles
 */
Route::get('/users/{user}/profiles', [UserController::class, 'showProfiles'])->middleware(['auth:sanctum', 'permission:users-listar-perfiles-usuario']);
Route::get('/users/{user}/profiles/{profile}', [UserController::class, 'showProfilesById'])->middleware(['auth:sanctum', 'permission:users-mostrar-perfil-especifico-por-usuario']);
Route::post('/users/{user}/profiles', [UserController::class, 'saveProfiles'])->middleware(['auth:sanctum', 'permission:users-guardar-perfil-por-usuario']);
Route::put('/users/{user}/profiles/{profile}', [UserController::class, 'updateProfileById'])->middleware(['auth:sanctum', 'permission:users-actualizar-perfil-por-usuario']);
Route::delete('/users/{user}/profiles/{profile}', [UserController::class, 'destroyProfilesById'])->middleware(['auth:sanctum', 'permission:users-borrar-perfiles-por-usuario']);
Route::delete('/users/{user}/profiles', [UserController::class, 'destroyProfiles'])->middleware(['auth:sanctum', 'permission:users-borrar-perfil-especifico-por-usuario']);
Route::get('/users/{user}/roles', [UserController::class, 'showRolesbyUser'])->middleware(['auth:sanctum', 'permission:users-listar-roles-por-usuario']);
Route::get('/users/{user}/profiles/{profile}/roles', [UserController::class, 'showRolesbyUserProfile'])->middleware(['auth:sanctum', 'permission:users-listar-roles-por-usuario-y-perfil']);
Route::post('/users/{user}/profiles/{profile}/roles', [UserController::class, 'saveRolesbyUserProfile'])->middleware(['auth:sanctum', 'permission:users-sincronizar-roles-por-usuario-y-perfil']);

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
Route::get('/type-periods', [TypePeriodController::class, 'index'])->middleware(['auth:sanctum', 'permission:typePeriods-listar-tiposPeriodos']);
Route::get('/type-periods/{typePeriod}', [TypePeriodController::class, 'show'])->middleware(['auth:sanctum', 'permission:typePeriods-obtener-tipoPeriodo']);
Route::post('/type-periods', [TypePeriodController::class, 'store'])->middleware(['auth:sanctum', 'permission:typePeriods-crear-tipoPeriodo']);
Route::patch('/type-periods/{typePeriod}', [TypePeriodController::class, 'update'])->middleware(['auth:sanctum', 'permission:typePeriods-actualizar-tipoPeriodo']);
Route::put('/type-periods/{typePeriod}', [TypePeriodController::class, 'update'])->middleware(['auth:sanctum', 'permission:typePeriods-actualizar-tipoPeriodo']);
Route::delete('/type-periods/{typePeriod}', [TypePeriodController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:typePeriods-borrar-tipoPeriodo']);

/**
 * Periods
 */
Route::get('/periods', [PeriodController::class, 'index'])->middleware(['auth:sanctum', 'permission:periods-listar-periodos']);
Route::get('/periods/{period}', [PeriodController::class, 'show'])->middleware(['auth:sanctum', 'permission:periods-obtener-periodo']);
Route::post('/periods', [PeriodController::class, 'store'])->middleware(['auth:sanctum', 'permission:periods-crear-periodo']);
Route::put('/periods/{period}', [PeriodController::class, 'update'])->middleware(['auth:sanctum', 'permission:periods-actualizar-periodo']);
Route::delete('/periods/{period}', [PeriodController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:periods-borrar-periodo']);
Route::get('/periods/{period}/offers', [PeriodController::class, 'showOffersByPeriod'])->middleware(['auth:sanctum', 'permission:periods-listar-ofertas-por-periodo']);
Route::delete('/periods/{period}/offers', [PeriodController::class, 'destroyOffersByPeriod'])->middleware(['auth:sanctum', 'permission:periods-borrar-ofertas-por-periodo']);
Route::get('/periods/{period}/hourhands', [PeriodController::class, 'showHourhandsByPeriod'])->middleware(['auth:sanctum', 'permission:periods-listar-horarios-por-periodo']);
Route::delete('/periods/{period}/hourhands', [PeriodController::class, 'destroyHourhandsByPeriod'])->middleware(['auth:sanctum', 'permission:periods-borrar-horarios-por-periodo']);


/**
 * MatterMesh
 */
Route::get('/matter-mesh', [SubjectCurriculumController::class, 'index'])->middleware(['auth:sanctum', 'permission:mattermesh-listar-materias-mallas']);
Route::get('/matter-mesh/{subjectcurriculum}', [SubjectCurriculumController::class, 'show'])->middleware(['auth:sanctum', 'permission:mattermesh-obtener-materias-mallas']);
Route::get('/matter-mesh/{subjectcurriculum}/dependencies', [SubjectCurriculumController::class, 'showDependencies'])->middleware(['auth:sanctum', 'permission:mattermesh-listar-dependencias-por-materias-mallas']);
Route::post('/matter-mesh', [SubjectCurriculumController::class, 'store'])->middleware(['auth:sanctum', 'permission:mattermesh-crear-materias-mallas']);
Route::post('/matter-mesh/{subjectcurriculum}/dependencies', [SubjectCurriculumController::class, 'asignDependencies'])->middleware(['auth:sanctum', 'permission:mattermesh-asignar-dependencias-por-materias-mallas']);
Route::put('/matter-mesh/{subjectcurriculum}', [SubjectCurriculumController::class, 'update'])->middleware(['auth:sanctum', 'permission:mattermesh-actualizar-materias-mallas']);
Route::patch('/matter-mesh/{id}', [SubjectCurriculumController::class, 'restoreSubjectRepository'])->middleware(['auth:sanctum', 'permission:mattermesh-actualizar-materias-mallas']);
Route::delete('/matter-mesh/{subjectcurriculum}', [SubjectCurriculumController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:mattermesh-borrar-materias-mallas']);
Route::get('/matter-mesh/{subjectcurriculum}/prerequisites', [SubjectCurriculumController::class, 'showPrerequisites'])->middleware(['auth:sanctum' ,'permission:mattermesh-listar-dependencias-por-materias-mallas']);
//Subject Curriculum
Route::get('/subject-curriculum', [SubjectCurriculumController::class, 'index'])->middleware(['auth:sanctum', 'permission:mattermesh-listar-materias-mallas']);
Route::get('/subject-curriculum/{subjectcurriculum}', [SubjectCurriculumController::class, 'show'])->middleware(['auth:sanctum', 'permission:mattermesh-obtener-materias-mallas']);
Route::get('/subject-curriculum/{subjectcurriculum}/dependencies', [SubjectCurriculumController::class, 'showDependencies'])->middleware(['auth:sanctum', 'permission:mattermesh-listar-dependencias-por-materias-mallas']);
Route::post('/subject-curriculum', [SubjectCurriculumController::class, 'store'])->middleware(['auth:sanctum', 'permission:mattermesh-crear-materias-mallas']);
Route::post('/subject-curriculum/{subjectcurriculum}/dependencies', [SubjectCurriculumController::class, 'asignDependencies'])->middleware(['auth:sanctum', 'permission:mattermesh-asignar-dependencias-por-materias-mallas']);
Route::put('/subject-curriculum/{subjectcurriculum}', [SubjectCurriculumController::class, 'update'])->middleware(['auth:sanctum', 'permission:mattermesh-actualizar-materias-mallas']);
Route::patch('/subject-curriculum/{id}', [SubjectCurriculumController::class, 'restoreSubjectRepository'])->middleware(['auth:sanctum', 'permission:mattermesh-actualizar-materias-mallas']);
Route::delete('/subject-curriculum/{subjectcurriculum}', [SubjectCurriculumController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:mattermesh-borrar-materias-mallas']);
Route::get('/subject-curriculum/{subjectcurriculum}/prerequisites', [SubjectCurriculumController::class, 'showPrerequisites'])->middleware(['auth:sanctum' ,'permission:mattermesh-listar-dependencias-por-materias-mallas']);
 
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
Route::get('/offers/{offer}/periods', [OfferController::class, 'showPeriodsByOffer'])->middleware(['auth:sanctum', 'permission:offers-listar-periodos-por-oferta']);
Route::get('/offers/{offer}/periods/{period}', [OfferController::class, 'showPeriodByOffer'])->middleware(['auth:sanctum', 'permission:offers-obtener-periodo-por-oferta']);
Route::get('/offers/{offer}/simbologies', [OfferController::class, 'showSimbologiesByOffer'])->middleware(['auth:sanctum', 'permission:offers-listar-simbologias-por-oferta']);
Route::post('/offers/{offer}/simbologies', [OfferController::class, 'assignSimbologiesByOffer'])->middleware(['auth:sanctum', 'permission:offers-asignar-simbologias-por-oferta']);

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

/**
 * Type Disability
 */
Route::get('type-disabilities', [TypeDisabilityController::class, 'index'])->middleware(['auth:sanctum', 'permission:type_disability-listar-tipo-discapacidad']);
Route::get('type-disabilities/{typedisabilities}', [TypeDisabilityController::class, 'show'])->middleware(['auth:sanctum', 'permission:type_disability-obtener-tipo-discapacidad']);

/**
 * TypeStudent
 */
Route::get('type-students', [TypeStudentController::class, 'index'])->middleware(['auth:sanctum', 'permission:type_students-listar-tipos-estudiantes']);
Route::get('type-students/{typeStudent}', [TypeStudentController::class, 'show'])->middleware(['auth:sanctum', 'permission:type_students-obtener-tipo-estudiante']);

/**
 * Blood Type
 */
Route::get('blood-types', [BloodTypeController::class, 'index'])->middleware(['auth:sanctum', 'permission:blood_type-listar-tipo-sangre']);
Route::get('blood-types/{bloodtype}', [BloodTypeController::class, 'show'])->middleware(['auth:sanctum', 'permission:blood_type-obtener-tipo-sangre']);

/**
 * Type Education
 */
Route::get('type-educations', [TypeEducationController::class, 'index'])->middleware(['auth:sanctum', 'permission:type_education-listar-tipo-educacion']);
Route::get('type-educations/{typeeducation}', [TypeEducationController::class, 'show'])->middleware(['auth:sanctum', 'permission:type_education-obtener-tipo-educacion']);

/**
 * Grupo Economico
 */
Route::get('economic-group', [EconomicGroupController::class, 'index'])->middleware(['auth:sanctum', 'permission:economic_group-listar-grupo-economico']);
Route::get('economic-group/{ecogroup}', [EconomicGroupController::class, 'show'])->middleware(['auth:sanctum', 'permission:economic_group-obtener-grupo-economico']);
Route::post('economic-group', [EconomicGroupController::class, 'store'])->middleware(['auth:sanctum', 'permission:economic_group-crear-grupo-economico']);
Route::put('economic-group/{ecogroup}', [EconomicGroupController::class, 'update'])->middleware(['auth:sanctum', 'permission:economic_group-actualizar-grupo-economico']);
Route::delete('economic-group/{ecogroup}', [EconomicGroupController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:economic_group-eliminar-grupo-economico']);

/**
 * Emergency Contact
 */
Route::get('emergency-contact', [EmergencyContactController::class, 'index'])->middleware(['auth:sanctum', 'permission:emergency_contact-listar-contacto-emergencia']);
Route::get('emergency-contact/{emergencycontact}', [EmergencyContactController::class, 'show'])->middleware(['auth:sanctum', 'permission:emergency_contact-obtener-contacto-emergencia']);
Route::post('emergency-contact', [EmergencyContactController::class, 'store'])->middleware(['auth:sanctum', 'permission:emergency_contact-crear-contacto-emergencia']);
Route::put('emergency-contact/{emergencycontact}', [EmergencyContactController::class, 'update'])->middleware(['auth:sanctum', 'permission:emergency_contact-actualizar-contacto-emergencia']);
Route::delete('emergency-contact/{emergencycontact}', [EmergencyContactController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:emergency_contact-eliminar-contacto-emergencia']);

/**
 * Student Record
 */
Route::get('student-records', [StudentRecordController::class, 'index'])->middleware(['auth:sanctum', 'permission:student_records-listar-record-estudiantil']);
Route::post('student-records', [StudentRecordController::class, 'store'])->middleware(['auth:sanctum', 'permission:student_records-crear-record-estudiantil']);
Route::get('student-records/{studentRecordProgram}/type-student-programs', [StudentRecordController::class, 'StudentRecordProgramAndTypeStudentPrograms'])->middleware(['auth:sanctum', 'permission:student-records-and-type-student-programs-listar-programa-registro-estudiantil-asociado-record-estudiante']);
Route::get('student-records/{studentRecord}', [StudentRecordController::class, 'show'])->middleware(['auth:sanctum', 'permission:student_records-obtener-record-estudiantil']);
Route::put('student-records/{studentRecord}', [StudentRecordController::class, 'update'])->middleware(['auth:sanctum', 'permission:student_records-actualizar-record-estudiantil']);
Route::delete('student-records/{studentRecord}', [StudentRecordController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:student_records-eliminar-record-estudiantil']);

/**
 * CriteriaStudentRecord
 */
Route::get('criteria-students-records', [CriteriaStudentRecordController::class, 'index'])->middleware(['auth:sanctum', 'permission:criteria_students_records-listar-criterio-record-estudiantil']);
Route::post('criteria-students-records', [CriteriaStudentRecordController::class, 'store'])->middleware(['auth:sanctum', 'permission:criteria_students_records-crear-criterio-record-estudiantil']);
Route::get('criteria-students-records/{criteriaStudentRecord}', [CriteriaStudentRecordController::class, 'show'])->middleware(['auth:sanctum', 'permission:criteria_students_records-obtener-criterio-record-estudiantil']);
Route::put('criteria-students-records/{criteriaStudentRecord}', [CriteriaStudentRecordController::class, 'update'])->middleware(['auth:sanctum', 'permission:criteria_students_records-actualizar-criterio-record-estudiantil']);
Route::delete('criteria-students-records/{criteriaStudentRecord}', [CriteriaStudentRecordController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:criteria_students_records-eliminar-criterio-record-estudiantil']);

/*
 * CurrentTenant
 */
Route::post('tenants/edit', [TenantController::class, 'updateCurrentTenant'])->middleware(['auth:sanctum', 'permission:tenant-actualizar-tenant']);
Route::post('tenants/logo', [TenantController::class, 'updateLogoCurrentTenant'])->middleware(['auth:sanctum', 'permission:tenant-actualizar-tenant']);

/**
 * Tag Student
 */
Route::get('tags-student', [TagStudentController::class, 'index'])->middleware(['auth:sanctum', 'permission:tags_student-listar-etiqueta']);
Route::get('tags-student/{tagstudent}', [TagStudentController::class, 'show'])->middleware(['auth:sanctum', 'permission:tags_student-obtener-etiqueta']);
Route::post('tags-student', [TagStudentController::class, 'store'])->middleware(['auth:sanctum', 'permission:tags_student-crear-etiqueta']);
Route::put('tags-student/{tagstudent}', [TagStudentController::class, 'update'])->middleware(['auth:sanctum', 'permission:tags_student-actualizar-etiqueta']);
Route::delete('tags-student/{tagstudent}', [TagStudentController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:tags_student-eliminar-etiqueta']);

/**
 * Persona Trabajo
 */
Route::get('person-job', [PersonJobController::class, 'index'])->middleware(['auth:sanctum', 'permission:person_job-listar-persona-trabajo']);
Route::get('person-job/{personjob}', [PersonJobController::class, 'show'])->middleware(['auth:sanctum', 'permission:person_job-obtener-persona-trabajo']);
Route::post('person-job', [PersonJobController::class, 'store'])->middleware(['auth:sanctum', 'permission:person_job-crear-persona-trabajo']);
Route::put('person-job/{personjob}', [PersonJobController::class, 'update'])->middleware(['auth:sanctum', 'permission:person_job-actualizar-persona-trabajo']);
Route::delete('person-job/{personjob}', [PersonJobController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:person_job-eliminar-persona-trabajo']);

/**
 * Status
 */
Route::get('status', [StatusController::class, 'index'])->middleware(['auth:sanctum', 'permission:status-listar-status']);

/**
 * Relative
 */
Route::get('/relatives', [RelativeController::class, 'index'])->middleware(['auth:sanctum', 'permission:relatives-listar-familiar']);
Route::get('/relatives/{relative}', [RelativeController::class, 'show'])->middleware(['auth:sanctum', 'permission:relatives-obtener-familiar']);
Route::post('/relatives', [RelativeController::class, 'store'])->middleware(['auth:sanctum', 'permission:relatives-crear-familiar']);
Route::put('/relatives/{relative}', [RelativeController::class, 'update'])->middleware(['auth:sanctum', 'permission:relatives-actualizar-familiar']);
Route::delete('/relatives/{relative}', [RelativeController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:relatives-borrar-familiar']);

/**
 * Component
 */
Route::get('/components', [ComponentController::class, 'index'])->middleware(['auth:sanctum', 'permission:components-listar-componente']);
Route::get('/components/{component}', [ComponentController::class, 'show'])->middleware(['auth:sanctum', 'permission:components-obtener-componente']);
Route::post('/components', [ComponentController::class, 'store'])->middleware(['auth:sanctum', 'permission:components-crear-componente']);
Route::put('/components/{component}', [ComponentController::class, 'update'])->middleware(['auth:sanctum', 'permission:components-actualizar-componente']);
Route::delete('/components/{component}', [ComponentController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:components-borrar-componente']);

/**
 * Details MatterMesh
 */
Route::get('/details-matter-mesh', [DetailSubjectCurriculumController::class, 'index'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-listar-detalle-materiamalla']);
Route::get('/details-matter-mesh/{detailsubjectcurriculum}', [DetailSubjectCurriculumController::class, 'show'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-obtener-detalle-materiamalla']);
Route::post('/details-matter-mesh', [DetailSubjectCurriculumController::class, 'store'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-crear-detalle-materiamalla']);
Route::put('/details-matter-mesh/{detailsubjectcurriculum}', [DetailSubjectCurriculumController::class, 'update'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-actualizar-detalle-materiamalla']);
Route::delete('/details-matter-mesh/{detailsubjectcurriculum}', [DetailSubjectCurriculumController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-borrar-detalle-materiamalla']);

Route::get('/details-subject-curriculum', [DetailSubjectCurriculumController::class, 'index'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-listar-detalle-materiamalla']);
Route::get('/details-subject-curriculum/{detailsubjectcurriculum}', [DetailSubjectCurriculumController::class, 'show'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-obtener-detalle-materiamalla']);
Route::post('/details-subject-curriculum', [DetailSubjectCurriculumController::class, 'store'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-crear-detalle-materiamalla']);
Route::put('/details-subject-curriculum/{detailsubjectcurriculum}', [DetailSubjectCurriculumController::class, 'update'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-actualizar-detalle-materiamalla']);
Route::delete('/details-subject-curriculum/{detailsubjectcurriculum}', [DetailSubjectCurriculumController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:details_matter_mesh-borrar-detalle-materiamalla']);


/**
 * Learning Component
 */
Route::get('/learning-components', [LearningComponentController::class, 'index'])->middleware(['auth:sanctum', 'permission:learning_components-listar-componente-aprendizaje']);
Route::get('/learning-components/{learningcomponent}', [LearningComponentController::class, 'show'])->middleware(['auth:sanctum', 'permission:learning_components-obtener-componente-aprendizaje']);
Route::post('/learning-components', [LearningComponentController::class, 'store'])->middleware(['auth:sanctum', 'permission:learning_components-crear-componente-aprendizaje']);
Route::put('/learning-components/{learningcomponent}', [LearningComponentController::class, 'update'])->middleware(['auth:sanctum', 'permission:learning_components-actualizar-componente-aprendizaje']);
Route::delete('/learning-components/{learningcomponent}', [LearningComponentController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:learning_components-borrar-componente-aprendizaje']);

Route::get('status', [StatusController::class, 'index'])->middleware(['auth:sanctum', 'permission:status-listar-status']);

/**
 * Student
 */
Route::get('students', [StudentController::class, 'index'])->middleware(['auth:sanctum', 'permission:student-listar-estudiante']);
Route::get('students/{student}', [StudentController::class, 'show'])->middleware(['auth:sanctum', 'permission:student-show-estudiante']);
Route::post('students', [StudentController::class, 'store'])->middleware(['auth:sanctum', 'permission:student-crear-estudiante']);
Route::put('students/{student}', [StudentController::class, 'update'])->middleware(['auth:sanctum', 'permission:student-update-estudiante']);
Route::post('students/photo', [StudentController::class, 'updatePhoto'])->middleware(['auth:sanctum', 'permission:student-update-photo-estudiante']);
Route::delete('students/{student}', [StudentController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:student-delete-estudiante']);

/**
 * Categoria Status
 */
Route::get('category-status', [CategoryStatusController::class, 'index'])->middleware(['auth:sanctum', 'permission:category-status-listar-categoria-estado']);

/**
 * Simbologies
 */
Route::get('/simbologies', [SimbologyController::class, 'index'])->middleware(['auth:sanctum', 'permission:simbology-listar-simbologias']);
Route::get('/simbologies/{simbology}', [SimbologyController::class, 'show'])->middleware(['auth:sanctum', 'permission:simbology-obtener-simbologia']);
Route::post('/simbologies', [SimbologyController::class, 'store'])->middleware(['auth:sanctum', 'permission:simbology-crear-simbologia']);
Route::put('/simbologies/{simbology}', [SimbologyController::class, 'update'])->middleware(['auth:sanctum', 'permission:simbology-actualizar-simbologia']);
Route::delete('/simbologies/{simbology}', [SimbologyController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:simbology-eliminar-simbologia']);

/**
 * ClassRoomType
 */
Route::get('/classroom-types', [ClassroomTypeController::class, 'index'])->middleware(['auth:sanctum', 'permission:classroomType-listar-tipos-de-aulas']);
Route::get('/classroom-types/{classroomType}', [ClassroomTypeController::class, 'show'])->middleware(['auth:sanctum', 'permission:classroomType-obtener-tipo-aula']);
Route::post('/classroom-types', [ClassroomTypeController::class, 'store'])->middleware(['auth:sanctum', 'permission:classroomType-crear-tipo-aula']);
Route::put('/classroom-types/{classroomType}', [ClassroomTypeController::class, 'update'])->middleware(['auth:sanctum', 'permission:classroomType-actualizar-tipo-aula']);
//Route::delete('/classroom-types/{classroomType}', [ClassroomTypeController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:classroomType-eliminar-tipo-aula']);

/**
 * Positions
 */
Route::get('/positions', [PositionController::class, 'index'])->middleware(['auth:sanctum', 'permission:positions-listar-cargos']);
Route::get('/positions/{position}', [PositionController::class, 'show'])->middleware(['auth:sanctum', 'permission:positions-obtener-cargo']);
Route::post('/positions', [PositionController::class, 'store'])->middleware(['auth:sanctum', 'permission:positions-crear-cargo']);
Route::put('/positions/{position}', [PositionController::class, 'update'])->middleware(['auth:sanctum', 'permission:positions-actualizar-cargo']);
Route::delete('/positions/{position}', [PositionController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:positions-eliminar-cargo']);

/**
 * Agreements (Convenios)
 */
Route::get('/agreements', [AgreementController::class, 'index'])->middleware(['auth:sanctum', 'permission:agreement-listar-convenios']);
Route::get('/agreements/{agreement}', [AgreementController::class, 'show'])->middleware(['auth:sanctum', 'permission:agreement-obtener-convenio']);
Route::post('/agreements', [AgreementController::class, 'store'])->middleware(['auth:sanctum', 'permission:agreement-crear-convenio']);
Route::put('/agreements/{agreement}', [AgreementController::class, 'update'])->middleware(['auth:sanctum', 'permission:agreement-actualizar-convenio']);
Route::post('/agreements/{agreement}/enabled', [AgreementController::class, 'enabled'])->middleware(['auth:sanctum', 'permission:agreement-activar-convenio']);
Route::post('/agreements/{agreement}/disabled', [AgreementController::class, 'disabled'])->middleware(['auth:sanctum', 'permission:agreement-desactivar-convenio']);

/**
 * Classroom Education Level 
 */
Route::get('/classroom-education-levels', [ClassroomEducationLevelController::class, 'index'])->middleware(['auth:sanctum', 'permission:classroom_education_levels-listar-aula-niveleconomico']);
Route::get('/classroom-education-levels/{classroomeducationlevel}', [ClassroomEducationLevelController::class, 'show'])->middleware(['auth:sanctum', 'permission:classroom_education_levels-obtener-aula-niveleconomico']);
Route::post('/classroom-education-levels', [ClassroomEducationLevelController::class, 'store'])->middleware(['auth:sanctum', 'permission:classroom_education_levels-crear-aula-niveleconomico']);
Route::put('/classroom-education-levels/{classroomeducationlevel}', [ClassroomEducationLevelController::class, 'update'])->middleware(['auth:sanctum', 'permission:classroom_education_levels-actualizar-aula-niveleconomico']);
Route::delete('/classroom-education-levels/{classroomeducationlevel}', [ClassroomEducationLevelController::class, 'destroy'])->middleware(['auth:sanctum', 'permission:classroom_education_levels-borrar-aula-niveleconomico']);
Route::patch('/classroom-education-levels/{classroomeducationlevel}/changestatus', [ClassroomEducationLevelController::class, 'changeStatus'])->middleware(['auth:sanctum', 'permission:classroom_education_levels-actualizar-aula-niveleconomico']);