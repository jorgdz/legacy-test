<?php

namespace App\Http\Controllers\Api\Contracts;


use App\Http\Requests\CollaboratorHourFormRequest;
use Illuminate\Http\Request;


use App\Models\CollaboratorHour;


interface ICollaboratorHourController
{


    /**
     * @OA\Get(
     *   path="/api/collaborator-hours",
     *   tags={"Horas de Colaborador"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las horas del colaborador",
     *   description="Muestra todas las horas colaborador en formato JSON",
     *   operationId="getAllCollaboratorHour",
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
     *   path="/api/collaborator-hours",
     *   tags={"Horas de Colaborador"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear hora de colaborador",
     *   description="Crear nueva hora de colaborador.",
     *   operationId="addCollaboratorHours",
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
     *           property="period_id",
     *           description="Id del periodo",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Id del nivel educativo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="ch_working_time",
     *           description="Tiempo dedicacion: TC=Tiempo completo & MT=Medio tiempo & TP=Tiempo parcial",
     *           type="string",
     *           example="TC/MT/TP",
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
     *           "period_id": "required|integer|exists:tenant.periods,id",
     *           "education_level_id": "required|integer|exists:tenant.education_levels,id",
     *           "ch_working_time": "required|string|max:3",
     *           "status_id": "required|integer|exists:status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(CollaboratorHourFormRequest $collaboratorHourFormRequest);

    /**
     * @OA\Get(
     *   path="/api/collaborator-hours/{id}",
     *   tags={"Horas de Colaborador"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una hora de colaborador",
     *   description="Muestra información específica de una hora de colaborador.",
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
     *     description="Id hora colaborador",
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
     *   path="/api/collaborator-hours/{collaboratorHour}",
     *   tags={"Horas de Colaborador"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar hora de colaborador",
     *   description="Actualizar hora de colaborador.",
     *   operationId="updateCollaboratorHour",
     *   @OA\Parameter(
     *     name="collaboratorHour",
     *     description="Id hora del colaborador",
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
     *           description="Id del periodo",
     *           type="int",
     *           example=0,
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Id del nivel educativo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="ch_working_time",
     *           description="Tiempo dedicacion: TC=Tiempo completo & MT=Medio tiempo & TP=Tiempo parcial",
     *           type="string",
     *           example="TC/MT/TP",
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
     *           "period_id": "required|integer|exists:tenant.periods,id",
     *           "education_level_id": "required|integer|exists:tenant.education_levels,id",
     *           "ch_working_time": "required|string|max:3",
     *           "status_id": "required|integer|exists:status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(CollaboratorHourFormRequest $request, CollaboratorHour $collaboratorHour);


    /**
     * @OA\Delete(
     *   path="/api/collaborator-hours/{collaboratorHour}",
     *   tags={"Horas de Colaborador"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar hora de colaborador",
     *   description="Eliminar hora de colaborador por Id",
     *   operationId="deleteCollaboratorHour",
     *   @OA\Parameter(
     *     name="collaboratorHour",
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
    public function destroy(CollaboratorHour $collaboratorHour);
}
