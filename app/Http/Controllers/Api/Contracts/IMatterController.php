<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Matter;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMatterRequest;

interface IMatterController {

    /**
     * @OA\Get(
     *   path="/api/matters",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las materias",
     *   description="Muestra todos las materias en formato JSON",
     *   operationId="getAllMatters",
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
     *   path="/api/matters",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una materia",
     *   description="Crear una nueva materia.",
     *   operationId="addMatter",
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
     *           property="mat_description",
     *           description="Descripción de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mat_acronym",
     *           description="Siglas de la materia",
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
     *           property="type_matter_id",
     *           description="Tipo de materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_calification_id",
     *           description="Tipo de calificación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="min_note",
     *           description="Nota mínima de la materia",
     *           type="number",
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
     *          "mat_name" : "required|string|unique:matters,mat_name",
     *          "mat_acronym" : "required|string|between:2,3",
     *          "cod_matter_migration" : "required|string",
     *          "type_matter_id" : "required|integer|exists:type_matters,id",
     *          "type_calification_id" : "required|integer|exists:type_califications,id",
     *          "min_note" : "required|numeric",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StoreMatterRequest $request);

    /**
     * @OA\Get(
     *   path="/api/matters/{id}",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una materia",
     *   description="Muestra información específica de una materia por Id.",
     *   operationId="getMatters",
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
     *   path="/api/matters/{matter}",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar la materia",
     *   description="Actualizar una materia.",
     *   operationId="updateMatters",
     *   @OA\Parameter(
     *     name="matter",
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
     *           property="mat_description",
     *           description="Descripción de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mat_acronym",
     *           description="Siglas de la materia",
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
     *           property="type_matter_id",
     *           description="Tipo de materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_calification_id",
     *           description="Tipo de calificación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="min_note",
     *           description="Nota mínima de la materia",
     *           type="number",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de calificación",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "mat_name" : "required|string|unique:matters,mat_name",
     *          "mat_acronym" : "required|string|between:2,3",
     *          "cod_matter_migration" : "required|string",
     *          "type_matter_id" : "required|integer|exists:type_matters,id",
     *          "type_calification_id" : "required|integer|exists:type_califications,id",
     *          "min_note" : "required|numeric",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(StoreMatterRequest $request, Matter $matter);

    /**
     * @OA\Delete(
     *   path="/api/matters/{matter}",
     *   tags={"Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una materia",
     *   description="Eliminar una materia por Id",
     *   operationId="deleteMatters",
     *   @OA\Parameter(
     *     name="matter",
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
    public function destroy(Matter $matter);
}
