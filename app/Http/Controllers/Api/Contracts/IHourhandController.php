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
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
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
    public function show(Request $request,Hourhand $hourhand);

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
     *           property="status_id",
     *           description="Estado del horario",
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
