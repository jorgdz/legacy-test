<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\EducationLevelSubjectRequest;
use App\Models\EducationLevelSubject;
use Illuminate\Http\Request;

interface IEducationLevelSubjectController
{
    /**
     * @OA\Get(
     *   path="/api/education-level-subject",
     *   tags={"Carreras y Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar materias de tipo nivelacion de carreras",
     *   description="Muestra todas los materias de tipo nivelacion de las carreras en formato JSON",
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
     *   path="/api/education-level-subject",
     *   tags={"Carreras y Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar materias de tipo nivelacion a una carrera",
     *   description="Asignar una nueva materia de tipo nivelacion a la carrera",
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
     *           property="group_area_keyword",
     *           description="Keyword del grupo de area a la que pertenece",
     *           type="string",
     *           example="G1"
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Carrera para asociar materias",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_id",
     *           description="Materia de tipo nivelacion",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "group_area_keyword"        : "required|string|exists:tenant.catalogs,cat_keyword",
     *           "education_level_id"   : "integer|exists:tenant.education_levels,id",
     *           "subject_id"           : "integer|exists:tenant.subjects,id",
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
     *   path="/api/education-level-subject/{id}",
     *   tags={"Carreras y Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una carrera con materias de tipo nivelacion",
     *   description="Muestra información específica de una carrera por Id.",
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
     *     description="Id de la carrera",
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
     *   path="/api/education-level-subject/{educationLevelSubject}",
     *   tags={"Carreras y Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar carrera con materias de tipo nivelacion",
     *   description="Actualizar una carrera.",
     *   operationId="updateEducationLevelSubject",
     *   @OA\Parameter(
     *     name="educationLevelSubject",
     *     description="Id de la carrera",
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
     *           property="period_id",
     *           description="Periodo a la que pertenece",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="group_area_keyword",
     *           description="Keyword del grupo de area a la que pertenece",
     *           type="string",
     *           example="G1"
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Carrera para asociar materias",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_id",
     *           description="Materia de tipo nivelacion",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "group_area_keyword"        : "required|string|exists:tenant.catalogs,cat_keyword",
     *           "education_level_id"   : "integer|exists:tenant.education_levels,id",
     *           "subject_id"           : "integer|exists:tenant.subjects,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(EducationLevelSubjectRequest $request, EducationLevelSubject $educationLevelSubject);

    /**
     * @OA\Delete(
     *   path="/api/education-level-subject/{educationLevelSubject}",
     *   tags={"Carreras y Materias de Nivelacion"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar carrera",
     *   description="Eliminar carrera por Id",
     *   operationId="deleteEducationLevelSubject",
     *   @OA\Parameter(
     *     name="educationLevelSubject",
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
    public function destroy (EducationLevelSubject $educationLevelSubject);
}
