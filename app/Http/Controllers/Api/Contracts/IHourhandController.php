<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Hourhand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHourhandRequest;

interface IHourhandController
{
    /**
     * @OA\Get(
     *   path="/api/hourhands",
     *   tags={"Horarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar horarios",
     *   description="Muestra todos los horarios paginadas en formato JSON",
     *   operationId="getAllHourhands",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Perfil de usuario",
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
     *   @OA\Parameter(
     *     name="data",
     *     description="Listar todos los horarios sin paginar",
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
     *   path="/api/hourhands",
     *   tags={"Horarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear horario",
     *   description="Crear un nuevo horario.",
     *   operationId="addHourhand",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Perfil de usuario",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="hour_monday",
     *           description="Lunes",
     *           type="boolean",
     *           example="true"
     *         ),
     *         @OA\Property(
     *           property="hour_tuesday",
     *           description="Martes",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_wednesday",
     *           description="Miercoles",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_thursday",
     *           description="Jueves",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_friday",
     *           description="Viernes",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_saturday",
     *           description="Sabado",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_sunday",
     *           description="Domingo",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_monday",
     *           description="Hora de inicio del Lunes",
     *           type="string",
     *           example="08:00:00"
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_monday",
     *           description="Hora final del Lunes",
     *           type="string",
     *           example="08:30:00"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_tuesday",
     *           description="Hora de inicio del Martes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_tuesday",
     *           description="Hora final del Martes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_wednesday",
     *           description="Hora de inicio del Miercoles",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_wednesday",
     *           description="Hora final del Miercoles",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_thursday",
     *           description="Hora de inicio del Jueves",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_thursday",
     *           description="Hora final del Jueves",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_friday",
     *           description="Hora de inicio del Viernes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_friday",
     *           description="Hora final del Viernes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_saturday",
     *           description="Hora de inicio del Sabado",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_saturday",
     *           description="Hora final del Sabado",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_sunday",
     *           description="Hora de inicio del Domingo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_sunday",
     *           description="Hora final del Domingo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="hour_description",
     *           description="Descripción",
     *           type="string",
     *           example="Algun descripción adicional"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del horario",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "hour_monday" : "boolean",
     *          "hour_tuesday" : "boolean",
     *          "hour_wednesday" : "boolean",
     *          "hour_thursday" : "boolean",
     *          "hour_friday" : "boolean",
     *          "hour_saturday" : "boolean",
     *          "hour_sunday" : "boolean",
     *          "status_id" : "integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store (StoreHourhandRequest $request);

    /**
     * @OA\Get(
     *   path="/api/hourhands/{hourhand}",
     *   tags={"Horarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener información de un horario",
     *   description="Muestra información específica de un horario.",
     *   operationId="showHourhand",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="hourhand",
     *     description="Id del horario",
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
    public function show(Hourhand $hourhand);

    /**
     * @OA\Put(
     *   path="/api/hourhands/{hourhand}",
     *   tags={"Horarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar información de un horario",
     *   description="Actualizar información de un horario.",
     *   operationId="updateHourhand",
     *   @OA\Parameter(
     *     name="hourhand",
     *     description="Id del horario",
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
     *           description="Perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="hour_monday",
     *           description="Lunes",
     *           type="boolean",
     *           example="true"
     *         ),
     *         @OA\Property(
     *           property="hour_tuesday",
     *           description="Martes",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_wednesday",
     *           description="Miercoles",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_thursday",
     *           description="Jueves",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_friday",
     *           description="Viernes",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_saturday",
     *           description="Sabado",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_sunday",
     *           description="Domingo",
     *           type="boolean",
     *           example="false"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_monday",
     *           description="Hora de inicio del Lunes",
     *           type="string",
     *           example="08:00:00"
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_monday",
     *           description="Hora final del Lunes",
     *           type="string",
     *           example="08:30:00"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_tuesday",
     *           description="Hora de inicio del Martes",
     *           type="string",
     *           example="09:00:00"
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_tuesday",
     *           description="Hora final del Martes",
     *           type="string",
     *           example="09:30:00"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_wednesday",
     *           description="Hora de inicio del Miercoles",
     *           type="string",
     *           example="10:00:00"
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_wednesday",
     *           description="Hora final del Miercoles",
     *           type="string",
     *           example="10:30:00"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_thursday",
     *           description="Hora de inicio del Jueves",
     *           type="string",
     *           example="11:00:00"
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_thursday",
     *           description="Hora final del Jueves",
     *           type="string",
     *           example="11:30:00"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_friday",
     *           description="Hora de inicio del Viernes",
     *           type="string",
     *           example="12:00:00"
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_friday",
     *           description="Hora final del Viernes",
     *           type="string",
     *           example="12:30:00"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_saturday",
     *           description="Hora de inicio del Sabado",
     *           type="string",
     *           example="13:00:00"
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_saturday",
     *           description="Hora final del Sabado",
     *           type="string",
     *           example="13:30:00"
     *         ),
     *         @OA\Property(
     *           property="hour_start_time_sunday",
     *           description="Hora de inicio del Domingo",
     *           type="string",
     *           example="14:00:00"
     *         ),
     *         @OA\Property(
     *           property="hour_end_time_sunday",
     *           description="Hora final del Domingo",
     *           type="string",
     *           example="14:30:00"
     *         ),
     *         @OA\Property(
     *           property="hour_description",
     *           description="Descripción",
     *           type="string",
     *           example="Algun descripción adicional"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del horario",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "hour_monday" : "boolean",
     *          "hour_tuesday" : "boolean",
     *          "hour_wednesday" : "boolean",
     *          "hour_thursday" : "boolean",
     *          "hour_friday" : "boolean",
     *          "hour_saturday" : "boolean",
     *          "hour_sunday" : "boolean",
     *          "status_id" : "integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(StoreHourhandRequest $request, Hourhand $stage);

     /**
     * @OA\Delete(
     *   path="/api/hourhands/{hourhand}",
     *   tags={"Horarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un horario",
     *   description="Eliminar un horario",
     *   operationId="deleteHourhand",
     *   @OA\Parameter(
     *     name="hourhand",
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
     *           description="Perfil de usuario",
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
    public function destroy(Hourhand $hourhand);
}
