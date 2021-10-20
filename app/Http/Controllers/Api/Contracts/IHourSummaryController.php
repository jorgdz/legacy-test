<?php

namespace App\Http\Controllers\Api\Contracts;


use App\Http\Requests\HourSummaryFormRequest;
use Illuminate\Http\Request;


use App\Models\HourSummary;


interface IHourSummaryController
{

    /**
     * @OA\Get(
     *   path="/api/hours-summaries",
     *   tags={"Resúmenes de horas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los resumen de hora",
     *   description="Muestra todas los resumen de hora en formato JSON",
     *   operationId="getAllHourSummary",
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
     *   path="/api/hours-summaries",
     *   tags={"Resúmenes de horas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear resumen de horas del colaborador",
     *   description="Crear nuevo  resumen de horas del colaborador.",
     *   operationId="addHourSummary",
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
     *           property="collaborator_id",
     *           description="Id del colaborador",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="hs_classes",
     *           description="Horas de clases",
     *           type="integer",
     *         ),
     *          @OA\Property(
     *           property="hs_classes_examns_preparation",
     *           description="Horas de preparacion de clases y examenes",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_tutoring",
     *           description="Horas de tutorias",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_bonding",
     *           description="Horas de vinculacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_academic_management",
     *           description="Horas de gestion academica",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_research",
     *           description="Horas de investigacion",
     *           type="integer",
     *         ),
     *          @OA\Property(
     *           property="period_id",
     *           description="Id Periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Id Nivel educativo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="requisition_id",
     *           description="Id requisito",
     *           type="integer",
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
     *          "collaborator_id"   : "required|integer|exists:tenant.collaborators,id",
     *          "hs_classes"   : "required|integer",
     *          "hs_classes_examns_preparation"   : "required|integer",
     *          "hs_bonding"   : "required|integer",
     *          "hs_tutoring"   : "required|integer",
     *          "hs_research"   : "required|integer",
     *          "hs_academic_management"   : "required|integer",
     *          "period_id"   : "required|integer|exists:tenant.periods,id",
     *          "education_level_id"   : "required|integer|exists:tenant.education_levels,id",
     *          "requisition_id":"integer",
     *          "status_id"   : "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(HourSummaryFormRequest $hourSummaryFormRequest);

    /**
     * @OA\Get(
     *   path="/api/hours-summaries/{id}",
     *   tags={"Resúmenes de horas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un resumen de hora",
     *   description="Muestra información específica de un resumen de hora.",
     *   operationId="getIdTypeDocument",
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
     *     description="Id resumen de hora",
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
     *   path="/api/hours-summaries/{hourSummary}",
     *   tags={"Resúmenes de horas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar resumen de hora",
     *   description="Actualizar un resumen de hora.",
     *   operationId="updateHourSummary",
     *   @OA\Parameter(
     *     name="hourSummary",
     *     description="Id del resumen de hora",
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
     *           property="collaborator_id",
     *           description="Id del colaborador",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_classes",
     *           description="Horas de clases",
     *           type="integer",
     *         ),
     *          @OA\Property(
     *           property="hs_classes_examns_preparation",
     *           description="Horas de preparacion de clases y examenes",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_tutoring",
     *           description="Horas de tutorias",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_bonding",
     *           description="Horas de vinculacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_academic_management",
     *           description="Horas de gestion academica",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hs_research",
     *           description="Horas de investigacion",
     *           type="integer",
     *         ),
     *           @OA\Property(
     *           property="period_id",
     *           description="Id Periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Id Nivel educativo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="requisition_id",
     *           description="Id requisito",
     *           type="integer",
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
     *          "collaborator_id"   : "required|integer|exists:tenant.collaborators,id",
     *          "hs_classes"   : "required|integer",
     *          "hs_classes_examns_preparation"   : "required|integer",
     *          "hs_bonding"   : "required|integer",
     *          "hs_tutoring"   : "required|integer",
     *          "hs_research"   : "required|integer",
     *          "hs_academic_management"   : "required|integer",
     *          "period_id"   : "required|integer|exists:tenant.periods,id",
     *          "education_level_id"   : "required|integer|exists:tenant.education_levels,id",
     *          "requisition_id":"integer",
     *          "status_id"   : "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(HourSummaryFormRequest $request, HourSummary $hourSummary);


    /**
     * @OA\Delete(
     *   path="/api/hours-summaries/{hourSummary}",
     *   tags={"Resúmenes de horas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar resumen de hora",
     *   description="Eliminar resumen de hora por Id",
     *   operationId="deleteHourSummary",
     *   @OA\Parameter(
     *     name="hourSummary",
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
    public function destroy(HourSummary $hourSummary);
}
