<?php

namespace App\Http\Controllers\Api\Contracts;

// use App\Http\Requests\SubjectCurriculumDependenciesRequest;
use App\Http\Requests\ClassroomEducationLevelRequest;
use App\Http\Requests\UpdateClassroomEducationLevelRequest;
use App\Models\ClassroomEducationLevel;
use App\Models\EducationLevel;
use App\Models\Period;
use Illuminate\Http\Request;

interface IClassroomEducationLevelController
{
    /**
     * @OA\Get(
     *   path="/api/classroom-education-levels",
     *   tags={"Asignacion aulas facultad"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar aulas asignadas a facultad",
     *   description="Muestra todas las aulas asignadas a facultad en formato JSON",
     *   operationId="getAllClassroomEducationLevel",
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
    public function index(Request $request);

    /**
     * @OA\Post(
     *   path="/api/classroom-education-levels",
     *   tags={"Asignacion aulas facultad"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar aulas a una facultad",
     *   description="Asignar aulas a una facultad.",
     *   operationId="addClassroomEducationLevel",
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
     *           property="period_id",
     *           description="ID Periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="ID facultad",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="classrooms",
     *           description="Array de id de aulas",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[7, 8]",
     *           uniqueItems=true
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
     *          "period_id"  :  "required|integer|exists:tenant.periods,id",
     *          "education_level_id"     :  "integer|exists:tenant.education_levels,id",
     *          "classrooms.*"  :  "array",
     *          "classrooms.*"  :  "required|integer|exists:tenant.classrooms,id",
     *          "status_id"        :  "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(ClassroomEducationLevelRequest $request);

    /**
     * @OA\Get(
     *   path="/api/classroom-education-levels/{id}",
     *   tags={"Asignacion aulas facultad"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una aula de una facultad",
     *   description="Muestra información específica de una aula de facultad por Id.",
     *   operationId="getdetailClassroomEducationLevel",
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
     *     description="Id aula facultad",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
     *   path="/api/classroom-education-levels/{classroomeducationlevel}",
     *   tags={"Asignacion aulas facultad"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar aula de una facultad",
     *   description="Actualizar un aula de una facultad.",
     *   operationId="updateClassroomeducationlevel",
     *   @OA\Parameter(
     *     name="classroomeducationlevel",
     *     description="Id detalle materia malla",
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
     *           property="period_id",
     *           description="ID Periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="ID facultad",
     *           type="integer",
     *         ),
     *        @OA\Property(
     *           property="classroom_id",
     *           description="ID aula",
     *           type="integer",
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
     *          "period_id"  :  "required|integer|exists:tenant.periods,id",
     *          "education_level_id"     :  "integer|exists:tenant.education_levels,id",
     *          "classroom_id*"  :  "required|integer|exists:tenant.classrooms,id",
     *          "status_id"        :  "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateClassroomEducationLevelRequest $request, ClassroomEducationLevel $classroomeducationlevel);

    /**
     * @OA\Delete(
     *   path="/api/classroom-education-levels/{classroomeducationlevel}",
     *   tags={"Asignacion aulas facultad"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un aula de facultad",
     *   description="Eliminar un aula de facultad por Id",
     *   operationId="deleteClassroomeducationlevel",
     *   @OA\Parameter(
     *     name="classroomeducationlevel",
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
    public function destroy(ClassroomEducationLevel $classroomeducationlevel);

    /**
     * @OA\Patch(
     *   path="/api/classroom-education-levels/{classroomeducationlevel}/changestatus",
     *   tags={"Asignacion aulas facultad"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Activa o desactiva un aula de facultad",
     *   description="Activa o desactiva un aula de facultad por status Id",
     *   operationId="restartclassroomeducationlevel",
     *   @OA\Parameter(
     *     name="classroomeducationlevel",
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

    /**
     * @OA\Get(
     *   path="/api/classroom-education-levels/periods/{periods}/education_levels/{education_levels}",
     *   tags={"Asignacion aulas facultad"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Buscar por {periods} y {education_levels} . Listar aulas asignadas a facultad ",
     *   description="Muestra todas las aulas asignadas a facultad  en formato JSON",
     *   operationId="getClassEduLvsByPeriodByEduLev",
     *   @OA\Parameter(
     *     name="periods",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="education_levels",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
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
    public function classEduLvsByPeriodByEduLev(Period $periods, EducationLevel $education_levels);
}
