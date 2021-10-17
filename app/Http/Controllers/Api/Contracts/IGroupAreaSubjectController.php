<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\EducationLevelSubjectRequest;
use App\Models\GroupAreaSubject;
use Illuminate\Http\Request;

interface IGroupAreaSubjectController
{
    /**
     * @OA\Get(
     *   path="/api/group-area-subjects",
     *   tags={"Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar materias de tipo nivelacion",
     *   description="Muestra todas los materias de tipo nivelacion en formato JSON",
     *   operationId="getAllEducationLevelSubject",
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
     *   path="/api/group-area-subjects",
     *   tags={"Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar materias de tipo nivelacion",
     *   description="Asignar una nueva materia de tipo nivelacion",
     *   operationId="addEducationLevelSubject",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="group_nivelation_id",
     *           description="Grupo area",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="subject_id",
     *           description="Materia de tipo nivelacion",
     *           type="integer",
     *         ),
     *        @OA\Property(
     *           property="status_id",
     *           description="Estado",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "group_nivelation_id"        : "required|string|exists:tenant.group_areas,id",
     *           "subject_id"           : "integer|exists:tenant.subjects,id",
     *           "status_id"           : "integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(EducationLevelSubjectRequest $educationLevelSubject);

    /**
     * @OA\Get(
     *   path="/api/group-area-subjects/{id}",
     *   tags={"Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una materia de tipo nivelacion en un grupo",
     *   description="Muestra información específica de una materia nivelacion en un determiando grupo por Id.",
     *   operationId="getEducationLevelSubject",
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
     *     description="Id del grupo nivelacion - materia nivelacion",
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
     *   path="/api/group-area-subjects/{groupAreaSubject}",
     *   tags={"Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar materias de tipo nivelacion en un grupo",
     *   description="Actualizar una carrera.",
     *   operationId="updateEducationLevelSubject",
     *   @OA\Parameter(
     *     name="groupAreaSubject",
     *     description="Id del grupo materia",
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
     *           property="group_nivelation_id",
     *           description="Grupo area",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="subject_id",
     *           description="Materia de tipo nivelacion",
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
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "group_nivelation_id"        : "required|string|exists:tenant.group_areas,id",
     *           "subject_id"                 : "integer|exists:tenant.subjects,id",
     *           "status_id"                  : "integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(EducationLevelSubjectRequest $request, GroupAreaSubject $groupAreaSubject);

    /**
     * @OA\Delete(
     *   path="/api/group-area-subjects/{groupAreaSubject}",
     *   tags={"Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar grupo materia de nivelación",
     *   description="Eliminar grupo materia de nivelación por ID",
     *   operationId="deleteEducationLevelSubject",
     *   @OA\Parameter(
     *     name="groupAreaSubject",
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
    public function destroy (GroupAreaSubject $groupAreaSubject);
}
