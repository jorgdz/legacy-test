<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\TypeMatter;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeMatterRequest;

interface ITypeMatterController {

    /**
     * @OA\Get(
     *   path="/api/type-matters",
     *   tags={"Tipos de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de materias",
     *   description="Muestra todos los tipos de materias en formato JSON",
     *   operationId="getAllTypeMatters",
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
     *   path="/api/type-matters",
     *   tags={"Tipos de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un tipo de materia",
     *   description="Crear un nuevo tipo de materia.",
     *   operationId="addTypeMatter",
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
     *           property="tm_name",
     *           description="Nombre del tipo de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tm_acronym",
     *           description="Siglas del tipo de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tm_description",
     *           description="Descripcion del tipo de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tm_cobro",
     *           description="Verificar si aplica cobro el tipo de materia",
     *           type="boolean",
     *         ),
     *         @OA\Property(
     *           property="tm_matter_count",
     *           description="Verificar si se cuenta el tipo de materia",
     *           type="boolean",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de materia",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "tm_name" : "required|string|unique:type_matters,tm_name",
     *          "tm_acronym" : "required|string|between:2,3",
     *          "tm_order" : "required|integer",
     *          "tm_cobro" : "required|boolean",
     *          "tm_matter_count" : "required|boolean",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StoreTypeMatterRequest $request);

    /**
     * @OA\Get(
     *   path="/api/type-matters/{id}",
     *   tags={"Tipos de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo de materia",
     *   description="Muestra información específica de un tipo de materia por Id.",
     *   operationId="getTypeMatters",
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
     *     description="Id del tipo de materia",
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
     *   path="/api/type-matters/{typeMatter}",
     *   tags={"Tipos de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar tipo de materia",
     *   description="Actualizar un tipo de materia.",
     *   operationId="updateTypeMatters",
     *   @OA\Parameter(
     *     name="typeMatter",
     *     description="Id del tipo de materia",
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
     *           property="tm_name",
     *           description="Nombre del tipo de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tm_acronym",
     *           description="Siglas del tipo de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tm_description",
     *           description="Descripción del tipo de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tm_order",
     *           description="Numero de orden del tipo de materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="tm_cobro",
     *           description="Verificar si aplica cobro el tipo de materia",
     *           type="boolean",
     *         ),
     *         @OA\Property(
     *           property="tm_matter_count",
     *           description="Verificar si se cuenta el tipo de materia",
     *           type="boolean",
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
     *          "tm_name" : "required|string|unique:type_matters,tm_name,typeMatter->id",
     *          "tm_acronym" : "required|string|between:2,3",
     *          "tm_order" : "required|integer",
     *          "tm_cobro" : "required|boolean",
     *          "tm_matter_count" : "required|boolean",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(StoreTypeMatterRequest $request, TypeMatter $typeMatter);

    /**
     * @OA\Delete(
     *   path="/api/type-matters/{typeMatter}",
     *   tags={"Tipos de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un tipo de materia",
     *   description="Eliminar un tipo de materia por Id",
     *   operationId="deleteTypeMatters",
     *   @OA\Parameter(
     *     name="typeMatter",
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
    public function destroy(TypeMatter $typeMatter);
}
