<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\PeriodStageRequest;
use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\ShowByUserProfileIdRequest;
use App\Http\Requests\StorePeriodStageRequest;
use App\Models\PeriodStage;

interface IPeriodStageController
{
    /**
     * @OA\Get(
     *   path="/api/periodstages",
     *   tags={"PeriodoEtapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los periodos por etapas",
     *   description="Muestra todos los periodos por etapas paginadas en formato JSON",
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
     *   path="/api/periodstages",
     *   tags={"PeriodoEtapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear periodo_etapa",
     *   description="Crear una nueva relacion periodo_etapa.",
     *   operationId="addPeriodStage",
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
     *           property="stage_id",
     *           description="Id de la etapa",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="period_id",
     *           description="Id del periodo",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="start_date",
     *           description="fecha de inicio",
     *           type="date",
     *         ),
     *         @OA\Property(
     *           property="end_date",
     *           description="fecha de fin",
     *           type="date",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Id del estado",
     *           type="int",
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
    public function store (StorePeriodStageRequest $request);

    /**
     * @OA\Get(
     *   path="/api/periodstages/{id}",
     *   tags={"PeriodoEtapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener información de un periodo_etapa",
     *   description="Muestra información específica de un periodo_etapa.",
     *   operationId="showPeriodStage",
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
     *     description="Id del periodo_etapa",
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
    public function show($id);

    /**
     * @OA\Put(
     *   path="/api/periodstages/{periodstage}",
     *   tags={"PeriodoEtapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar información de un periodo_etapa",
     *   description="Actualizar información de un periodo_etapa.",
     *   operationId="updatePeriodStage",
     *   @OA\Parameter(
     *     name="periodstage",
     *     description="Id del periodStage",
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
     *           property="stage_id",
     *           description="Id de la etapa",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="period_id",
     *           description="Id del periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="start_date",
     *           description="fecha de inicio",
     *           type="string",
     *           format="date",
     *         ),
     *         @OA\Property(
     *           property="end_date",
     *           description="fecha de fin",
     *           type="string",
     *           format="date",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Id del estado",
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
    public function update(PeriodStageRequest $request, PeriodStage $periodstage);

     /**
     * @OA\Delete(
     *   path="/api/periodstages/{periodstage}",
     *   tags={"PeriodoEtapas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un periodo_etapa",
     *   description="Eliminar un periodo_etapa por Id",
     *   operationId="deletePeriodStage",
     *   @OA\Parameter(
     *     name="periodstage",
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
    public function destroy(PeriodStage $periodstage);
}
