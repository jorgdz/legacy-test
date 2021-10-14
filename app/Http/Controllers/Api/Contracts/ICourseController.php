<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

interface ICourseController
{
    /**
     * @OA\Get(
     *   path="/api/courses",
     *   tags={"Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar cursos",
     *   description="Muestra todos los cursos en formato JSON",
     *   operationId="getAllCourse",
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
     *   path="/api/courses",
     *   tags={"Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar aulas a una facultad",
     *   description="Asignar cursos.",
     *   operationId="addCourses",
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
     *           property="max_capacity",
     *           description="Capacidad Maxima del curso",
     *           type="integer",
     *           example="30"
     *         ),
     *         @OA\Property(
     *           property="matter_id",
     *           description="ID Materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="parallel_id",
     *           description="ID Paralelo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="classroom_id",
     *            description="ID Aula",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="modality_id",
     *            description="ID Modalidad",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="hourhand_id",
     *            description="ID Horario",
     *            type="integer",
     *         ),
     *          @OA\Property(
     *           property="collaborators",
     *           description="Array de id de Colaboradores docentes",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1, 2]",
     *           uniqueItems=true
     *         ),
     *         @OA\Property(
     *           property="curriculum_id",
     *            description="ID Malla",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="period_id",
     *            description="ID Periodo",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del componente",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *       "matter_id"      : "required|integer|exists:tenant.subjects,id",
     *       "max_capacity"   : "required|integer",
     *       "parallel_id"    : "required|integer|exists:tenant.parallels,id",
     *       "classroom_id"   : "required|integer|exists:tenant.classrooms,id",
     *       "modality_id"    : "required|integer|exists:tenant.catalogs,id",
     *       "hourhand_id"    : "required|integer|exists:tenant.hourhands,id",
     *       "period_id"      : "required|integer|exists:tenant.periods,id",
     *       "collaborators": "array",
     *       "collaborators.*": "required|integer|exists:tenant.collaborators,id",
     *       "curriculum_id" : "required|integer|exists:tenant.curriculums,id",
     *       "status_id"      : "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(CourseRequest $request);

        /**
     * @OA\Get(
     *   path="/api/courses/{id}",
     *   tags={"Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un curso",
     *   description="Muestra información específica de un curso por Id.",
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
     *     description="Id del curso",
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
     *   path="/api/courses/{course}",
     *   tags={"Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar un curso",
     *   description="Actualizar un curso.",
     *   operationId="updateCourse",
     *   @OA\Parameter(
     *     name="course",
     *     description="Id curso",
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
     *      @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="max_capacity",
     *           description="Capacidad Maxima del curso",
     *           type="integer",
     *           example="30"
     *         ),
     *         @OA\Property(
     *           property="matter_id",
     *           description="ID Materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="parallel_id",
     *           description="ID Paralelo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="classroom_id",
     *            description="ID Aula",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="modality_id",
     *            description="ID Modalidad",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="hourhand_id",
     *            description="ID Horario",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="collaborator_id",
     *            description="ID Colaborador",
     *            type="integer",
     *         ),
     *        @OA\Property(
     *           property="curriculum_id",
     *            description="ID Malla",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="period_id",
     *            description="ID Periodo",
     *            type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del componente",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *            "matter_id"    : "required|integer|exists:tenant.subjects,id",
     *            "max_capacity" : "required|integer",
     *            "parallel_id"  : "required|integer|exists:tenant.parallels,id",
     *            "classroom_id" : "required|integer|exists:tenant.classrooms,id",
     *            "modality_id"  : "required|integer|exists:tenant.catalogs,id",
     *            "hourhand_id"  : "required|integer|exists:tenant.hourhands,id",
     *            "curriculum_id": "required|integer|exists:tenant.curriculums,id",
     *            "period_id"    : "required|integer|exists:tenant.periods,id",
     *            "status_id"    : "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateCourseRequest $request, Course $course);

        /**
     * @OA\Delete(
     *   path="/api/courses/{course}",
     *   tags={"Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un curso",
     *   description="Eliminar un curso por Id",
     *   operationId="deleteCourse",
     *   @OA\Parameter(
     *     name="course",
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
    public function destroy(Course $course);

      /**
     * @OA\Patch(
     *   path="/api/courses/{course}/changestatus",
     *   tags={"Cursos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Activa o desactiva un curso",
     *   description="Activa o desactiva un curso por status Id",
     *   operationId="restartCourse",
     *   @OA\Parameter(
     *     name="course",
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
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado",
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
    public function changeStatus(Request $request, $id);

}
