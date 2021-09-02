<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Requests\StorePeriodRequest;

interface IPeriodController
{
    /**
     * @OA\Get(
     *   path="/api/periods",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las periodos",
     *   description="Muestra todos los periodos paginadas en formato JSON",
     *   operationId="getAllPeriods",
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
     *   path="/api/periods",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear periodo",
     *   description="Crear un nuevo periodo.",
     *   operationId="addPeriod",
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
     *           property="campus_id",
     *           description="Campus del periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_period_id",
     *           description="Tipo de Periodo asociado",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del periodo",
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
    public function store (StorePeriodRequest $request);

    /**
     * @OA\Get(
     *   path="/api/periods/{period}",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener información de un periodo",
     *   description="Muestra información específica de un periodo.",
     *   operationId="showPeriod",
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
     *     name="period",
     *     description="Periodo",
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
    public function show(Request $request,$period);

    /**
     * @OA\Put(
     *   path="/api/periods/{period}",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar información de un periodo",
     *   description="Actualizar información de un periodo.",
     *   operationId="updatePeriod",
     *   @OA\Parameter(
     *     name="period",
     *     description="Periodo",
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
     *           property="campus_id",
     *           description="Campus del periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_period_id",
     *           description="Tipo de Periodo asociado",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del periodo",
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
    public function update(StorePeriodRequest $request, Period $period);

     /**
     * @OA\Delete(
     *   path="/api/periods/{period}",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un periodo",
     *   description="Eliminar un periodo por Id",
     *   operationId="deletePeriod",
     *   @OA\Parameter(
     *     name="period",
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
    public function destroy(Period $period);
}