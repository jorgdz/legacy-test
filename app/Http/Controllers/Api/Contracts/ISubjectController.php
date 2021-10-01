<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectRequest;

interface ISubjectController {

    /**
     * @OA\Get(
     *   path="/api/subjects",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las materias",
     *   description="Muestra todos las materias en formato JSON",
     *   operationId="getAllSubject",
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
     *   path="/api/subjects",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una materia",
     *   description="Crear una nueva materia.",
     *   operationId="addSubject",
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
     *           property="mat_name",
     *           description="Nombre de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cod_matter_migration",
     *           description="Código de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cod_old_migration",
     *           description="Código anterior de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mat_acronym",
     *           description="Siglas de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mat_translate",
     *           description="Traduccion de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mat_description",
     *           description="Descripción de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_matter_id",
     *           description="Tipo de materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Tipo de calificación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="area_id",
     *           description="Tipo de area",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la materia",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "mat_name": "required|string|unique:tenant.subjects,mat_name",
     *          "cod_matter_migration": "nullable|string",
     *          "cod_old_migration": "nullable|string",
     *          "mat_acronym": "nullable|string|max:3",
     *          "mat_translate": "nullable|string",
     *          "type_matter_id": "required|integer|exists:tenant.type_subjects,id",
     *          "education_level_id": "required|integer|exists:tenant.education_levels,id",
     *          "area_id": "required|integer|exists:tenant.areas,id",
     *          "status_id": "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StoreSubjectRequest $request);

    /**
     * @OA\Get(
     *   path="/api/subjects/{id}",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una materia",
     *   description="Muestra información específica de una materia por Id.",
     *   operationId="getSubjects",
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
     *     description="Id de la materia",
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
     *   path="/api/subjects/{subject}",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar la materia",
     *   description="Actualizar una materia.",
     *   operationId="updateSubjects",
     *   @OA\Parameter(
     *     name="subject",
     *     description="Id de la materia",
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
     *         @OA\Property(
     *           property="mat_name",
     *           description="Nombre de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cod_matter_migration",
     *           description="Código de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cod_old_migration",
     *           description="Código anterior de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mat_acronym",
     *           description="Siglas de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mat_translate",
     *           description="Traduccion de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mat_description",
     *           description="Descripción de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_matter_id",
     *           description="Tipo de materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Tipo de calificación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="area_id",
     *           description="Tipo de area",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la materia",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "mat_name": "required|string|unique:tenant.subjects,mat_name",
     *          "cod_matter_migration": "nullable|string",
     *          "cod_old_migration": "nullable|string",
     *          "mat_acronym": "nullable|string|max:3",
     *          "mat_translate": "nullable|string",
     *          "type_matter_id": "required|integer|exists:tenant.type_subjects,id",
     *          "education_level_id": "required|integer|exists:tenant.education_levels,id",
     *          "area_id": "required|integer|exists:tenant.areas,id",
     *          "status_id": "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(StoreSubjectRequest $request, Subject $subject);

    /**
     * @OA\Delete(
     *   path="/api/subjects/{subject}",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una materia",
     *   description="Eliminar una materia por Id",
     *   operationId="deleteSubjects",
     *   @OA\Parameter(
     *     name="subject",
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
    public function destroy(Subject $subject);
}
