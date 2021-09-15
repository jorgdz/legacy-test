<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;

interface IStageController
{
    /**
     * @OA\Get(
     *   path="/api/stages",
     *   tags={"Etapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las etapas",
     *   description="Muestra todas las etapas paginadas en formato JSON",
     *   operationId="getAllStages",
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
     *     description="Ordenar por columna",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="id"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="type_sort",
     *     description="Sentido del Orden",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="desc"
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
     *   path="/api/stages",
     *   tags={"Etapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear etapa",
     *   description="Crear una nueva etapa.",
     *   operationId="addStage",
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
     *           property="stg_name",
     *           description="Nombre de la etapa",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="stg_description",
     *           description="Descripción asociada a la etapa",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="stg_acronym",
     *           description="Siglas de la etapa",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la etapa",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store (StoreStageRequest $request);

    /**
     * @OA\Get(
     *   path="/api/stages/{stage}",
     *   tags={"Etapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener información de una etapa",
     *   description="Muestra información específica de una etapa.",
     *   operationId="showStage",
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
     *     name="stage",
     *     description="Id de la etapa",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
    public function show(Request $request,Stage $stage);

    /**
     * @OA\Put(
     *   path="/api/stages/{stage}",
     *   tags={"Etapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar información de una etapa",
     *   description="Actualizar información de una etapa.",
     *   operationId="updateStage",
     *   @OA\Parameter(
     *     name="stage",
     *     description="Id de la etapa",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
     *           property="stg_name",
     *           description="Nombre de la etapa",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="stg_description",
     *           description="Descripción de la etapa",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="stg_acronym",
     *           description="Siglas de la etapa",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la etapa",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateStageRequest $request, Stage $stage);

     /**
     * @OA\Delete(
     *   path="/api/stages/{stage}",
     *   tags={"Etapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una etapa",
     *   description="Eliminar una etapa por Id",
     *   operationId="deleteStage",
     *   @OA\Parameter(
     *     name="stage",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function destroy(Stage $stage);
}
