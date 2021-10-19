<?php

namespace App\Http\Controllers\Api\Contracts;


use App\Models\CourseStudent;
use Illuminate\Http\Request;
use App\Http\Requests\CourseStudentRequest;
use App\Http\Requests\ConditionsBySubjectRequest;
use App\Http\Requests\ConditionsGeneralStudentRequest;
use App\Models\StudentRecord;
use App\Models\Subject;

interface ICourseStudentController
{

    /**
     * @OA\Get(
     *   path="/api/course-students",
     *   tags={"Estudiantes Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar estudiantes registrados en cursos",
     *   description="Muestra todos los cursos estudiantes en formato JSON",
     *   operationId="getAllCourseStudent",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="page",
     *     description="Numero de la paginación",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="size",
     *     description="Numero de elementos por pagina",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="integer",
     *       example="10"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="sort",
     *     description="Ordenar por el campo",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="id"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="type_sort",
     *     description="Tipo de orden",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="asc"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="data",
     *     description="mostrar todos los datos sin paginacion (enviar all)",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="search",
     *     description="Filtrar registros",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index (Request $request);

    /**
     * @OA\Post(
     *   path="/api/course-students",
     *   tags={"Estudiantes Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Registro de estudiantes a un curso",
     *   description="Registrar Estudiantes a un curso.",
     *   operationId="addCourseStudent",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *        mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="course_id",
     *           description="Id del curso",
     *           type="integer",
     *           example="30"
     *         ),
     *         @OA\Property(
     *           property="student_record_id",
     *           description="ID del record del estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="final_note",
     *           description="Nota Final",
     *           type="number",
     *         ),
     *         @OA\Property(
     *           property="observation",
     *            description="Observacion",
     *            type="string",
     *         ),
     *         @OA\Property(
     *           property="num_fouls",
     *            description="Numero de faltas",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_status_id",
     *            description="Estado de la materia",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_id",
     *            description="Id de la materia",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="period_id",
     *            description="ID del periodo",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="curriculum_id",
     *            description="ID de Malla",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_curriculum_id",
     *            description="ID de Materia Malla",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="approval_status",
     *            description="ID estado de aprobacion",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="approval_reason_id",
     *            description="ID motivo de aprobacion",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del recurso",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *      "course_id"             : "required|integer|exists:tenant.courses,id",
     *      "student_record_id"     : "required|integer|exists:tenant.student_records,id",
     *      "final_note"            : "nullable|numeric",
     *      "observation"           : "nullable|string",
     *      "num_fouls"             : "nullable|integer",
     *      "subject_status_id"     : "required|integer|exists:tenant.subject_status,id",
     *      "subject_id"            : "required|integer|exists:tenant.subjects,id",
     *      "period_id"             : "required|integer|exists:tenant.periods,id",
     *      "subject_curriculum_id" : "required|integer|exists:tenant.periods,id",
     *      "curriculum_id"         : "required|integer|exists:tenant.periods,id",
     *      "approval_status"       : "Al crear registro se debe guardar con estado cursando |required|integer|exists:tenant.status,id",
     *      "approval_reason_id"    : "Al crear registro se debe guardar con estado Cursando Materia |required|integer|exists:tenant.catalogs,id",
     *      "status_id"             : "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(CourseStudentRequest $request);

    /**
     * @OA\Get(
     *   path="/api/course-students/{id}",
     *   tags={"Estudiantes Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un estudiante registrado en curso",
     *   description="Muestra información estudiante registrado en curso por Id.",
     *   operationId="getCourse",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="id",
     *     description="Id Estudiante Curso",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function show($id);

    /**
     * @OA\Put(
     *   path="/api/course-students/{coursestudent}",
     *   tags={"Estudiantes Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar un estudiante registrado en un curso",
     *   description="Actualizar un curso.",
     *   operationId="updateCourse",
     *   @OA\Parameter(
     *     name="coursestudent",
     *     description="Id CourseStudent",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *        mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="course_id",
     *           description="Id del curso",
     *           type="integer",
     *           example="30"
     *         ),
     *         @OA\Property(
     *           property="student_record_id",
     *           description="ID del record del estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="final_note",
     *           description="Nota Final",
     *           type="number",
     *         ),
     *         @OA\Property(
     *           property="observation",
     *            description="Observacion",
     *            type="string",
     *         ),
     *         @OA\Property(
     *           property="num_fouls",
     *            description="Numero de faltas",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_status_id",
     *            description="Estado de la materia",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_id",
     *            description="Id de la materia",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="period_id",
     *            description="ID del periodo",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="curriculum_id",
     *            description="ID de Malla",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_curriculum_id",
     *            description="ID de Materia Malla",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="approval_status",
     *            description="ID estado de aprobacion",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="approval_reason_id",
     *            description="ID motivo de aprobacion",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del recurso",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *              "course_id"             : "required|integer|exists:tenant.courses,id",
     *              "student_record_id"     : "required|integer|exists:tenant.student_records,id",
     *              "final_note"            : "nullable|numeric",
     *              "observation"           : "nullable|string",
     *              "num_fouls"             : "nullable|integer",
     *              "subject_status_id"     : "required|integer|exists:tenant.subject_status,id",
     *              "subject_id"            : "required|integer|exists:tenant.subjects,id",
     *              "period_id"             : "required|integer|exists:tenant.periods,id",
     *              "subject_curriculum_id" : "required|integer|exists:tenant.periods,id",
     *              "curriculum_id"         : "required|integer|exists:tenant.periods,id",
     *              "approval_status"       : "required|integer|exists:tenant.status,id",
     *              "approval_reason_id"    : "required|integer|exists:tenant.catalogs,id",
     *              "status_id"             : "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(CourseStudentRequest $request, CourseStudent $coursestudent);

    /**
     * @OA\Delete(
     *   path="/api/course-students/{coursestudent}",
     *   tags={"Estudiantes Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un registro de estudiante en un curso",
     *   description="Eliminar registro de estudiante en un curso por Id",
     *   operationId="deleteCourse",
     *   @OA\Parameter(
     *     name="coursestudent",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
     *     ),
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function destroy(CourseStudent $coursestudent);

    /**
     * @OA\Get(
     *   path="/api/course-students/{subject}/subject-conditions",
     *   tags={"Estudiantes Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Condiciones registro estudiantes a curso por Id Materia ",
     *   description="Condiciones registro estudiantes a curso por Id Materia.",
     *   operationId="getCourseStudentValidationSubject",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="subject",
     *     description="Id Materia",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="student_record_id",
     *     description="Id Record Student",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="curriculum_id",
     *     description="Id Malla",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="subject_id",
     *     description="Id Materia",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="period_id",
     *     description="Id Periodo",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="status_id",
     *     description="Id Status",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *            "student_record_id" : "required|integer|exists:tenant.student_records,id",
     *            "subject_id"        : "required|integer|exists:tenant.subjects,id",
     *            "curriculum_id"     : "required|integer|exists:tenant.curriculums,id",
     *            "period_id"         : "required|integer|exists:tenant.periods,id",
     *            "status_id"         : "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function checkSubjectConditions(Subject $subject, ConditionsBySubjectRequest $request);

     /**
     * @OA\Get(
     *   path="/api/course-students/{student}/conditions",
     *   tags={"Estudiantes Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Condiciones generales registro estudiantes a curso por Id Record Estudiante ",
     *   description="Condiciones generales registro estudiantes a curso por Id Record Estudiante.",
     *   operationId="getCourseStudentValidationStudent",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="student",
     *     description="Id Estudiante",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="student_record_id",
     *     description="Id Record Student",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="curriculum_id",
     *     description="Id Malla",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="period_id",
     *     description="Id Periodo",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="status_id",
     *     description="Id Status",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *            "student_record_id" : "required|integer|exists:tenant.student_records,id",
     *            "period_id"         : "required|integer|exists:tenant.periods,id",
     *            "curriculum_id"     : "required|integer|exists:tenant.curriculums,id",
     *            "status_id"         : "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function checkConditionsGeneralByStudent(StudentRecord $student, ConditionsGeneralStudentRequest $request);

}
