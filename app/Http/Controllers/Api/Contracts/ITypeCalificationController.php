<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Models\TypeCalification;
use App\Http\Requests\StoreTypeCalificationRequest;
use App\Http\Requests\UpdateTypeCalificationRequest;

interface ITypeCalificationController {

    /**
     * @OA\Get(
     *   path="/api/type-califications",
     *   tags={"Tipo de Calificaciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de calificaciones",
     *   description="Muestra todos los tipos de calificaciones en formato JSON",
     *   operationId="getAllTypeCalifications",
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
     *   path="/api/type-califications",
     *   tags={"Tipo de Calificaciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un tipo de calificación",
     *   description="Crear un nuevo tipo de calificación.",
     *   operationId="addTypeCalification",
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
     *           property="tc_name",
     *           description="Nombre del tipo de calificación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tc_description",
     *           description="Descripción del tipo de calificación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de calificación",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "tc_name" : "required|string|unique:type_califications,tc_name",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StoreTypeCalificationRequest $request);

    /**
     * @OA\Get(
     *   path="/api/type-califications/{id}",
     *   tags={"Tipo de Calificaciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo de calificación",
     *   description="Muestra información específica de un tipo de calificación por Id.",
     *   operationId="getTypeCalifications",
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
     *     description="Id del tipo de calificación",
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
     *   path="/api/type-califications/{typeCalification}",
     *   tags={"Tipo de Calificaciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar tipo de calificación",
     *   description="Actualizar un tipo de calificación.",
     *   operationId="updateTypeCalifications",
     *   @OA\Parameter(
     *     name="typeCalification",
     *     description="Id del tipo de calificación",
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
     *           property="tc_name",
     *           description="Nombre del tipo de calificación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tc_description",
     *           description="Descripción del tipo de calificación",
     *           type="string",
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
     *          "tc_name" : "required|string|unique:type_califications,tc_name",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateTypeCalificationRequest $request, TypeCalification $typeCalification);

    /**
     * @OA\Delete(
     *   path="/api/type-califications/{typeCalification}",
     *   tags={"Tipo de Calificaciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un tipo de calificación",
     *   description="Eliminar un tipo de calificación por Id",
     *   operationId="deleteTypeCalifications",
     *   @OA\Parameter(
     *     name="typeCalification",
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
    public function destroy(TypeCalification $typeCalification);
}
