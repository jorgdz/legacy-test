<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\CalificationModelFormRequest;
use App\Models\CalificationModel;
use Illuminate\Http\Request;



interface ICalificationModelController
{

    /**
     * @OA\Get(
     *   path="/api/calification-models",
     *   tags={"Modelos de calificación"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los modelos de calificación",
     *   description="Muestra todas los modelos de calificación en formato JSON",
     *   operationId="getAllCalificationModel",
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
     *   @OA\Parameter(
     *     name="data",
     *     description="mostrar todos los datos sin paginacion (enviar all)",
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
     *   path="/api/calification-models",
     *   tags={"Modelos de calificación"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear modelo de calificación",
     *   description="Crear nuevo modelos de calificación.",
     *   operationId="addCalificationModel",
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
     *           property="cal_mod_name",
     *           description="Nombre del modelo de calificación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cal_mod_acronym",
     *           description="Sigla del modelo de calificación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cal_mod_equivalence",
     *           description="Equivalencia del modelo de calificación",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la malla",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *         "cal_mod_name" : "required|string|max:255|unique:tenant.calification_models,cal_mod_name",
     *         "cal_mod_acronym" : "required|string|max:10|unique:tenant.calification_models,cal_mod_acronym",
     *         "cal_mod_equivalence" : "required|boolean",
     *         "status_id": "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(CalificationModelFormRequest $educationLevelFormRequest);



    /**
     * @OA\Get(
     *   path="/api/calification-models/{id}",
     *   tags={"Modelos de calificación"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un modelo de calificación",
     *   description="Muestra información específica de un  modelo de calificación.",
     *   operationId="getIdCalificationModel",
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
     *     description="Id del modelo de calificación",
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
     *   path="/api/calification-models/{calificationModel}",
     *   tags={"Modelos de calificación"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar modelo de calificación",
     *   description="Actualizar nuevo modelos de calificación.",
     *   operationId="updateCalificationModel",
     *   @OA\Parameter(
     *     name="calificationModel",
     *     description="Id del model de calificación",
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
     *           property="cal_mod_name",
     *           description="Nombre del modelo de calificación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cal_mod_acronym",
     *           description="Sigla del modelo de calificación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cal_mod_equivalence",
     *           description="Equivalencia del modelo de calificación",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la malla",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *         "cal_mod_name" : "required|string|max:255|unique:tenant.calification_models,cal_mod_name",
     *         "cal_mod_acronym" : "required|string|max:10|unique:tenant.calification_models,cal_mod_acronym",
     *         "cal_mod_equivalence" : "required|boolean",
     *         "status_id": "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(CalificationModelFormRequest $request, CalificationModel $typeDocument);


    /**
     * @OA\Delete(
     *   path="/api/calification-models/{calificationModel}",
     *   tags={"Modelos de calificación"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un modelo de calificación",
     *   description="Eliminar un modelo de calificación por Id",
     *   operationId="deleteCalificationModel",
     *   @OA\Parameter(
     *     name="calificationModel",
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
    public function destroy(CalificationModel $typeDocument);
}
