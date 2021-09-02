<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\TypePeriod;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypePeriodRequest;

interface ITypePeriodController
{
    /**
     * @OA\Get(
     *   path="/api/typePeriods",
     *   tags={"Tipos de periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de periodos",
     *   description="Muestra todos los tipos de periodos paginados en formato JSON",
     *   operationId="getAllTypePeriods",
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
     *   path="/api/typePeriods",
     *   tags={"Tipos de periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un tipo de periodo",
     *   description="Crear un nuevo tipo de periodo.",
     *   operationId="addTypePeriod",
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
     *           property="tp_name",
     *           description="Nombre del nuevo tipo de periodo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tp_description",
     *           description="Descripción asociada al nuevo tipo de periodo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de periodo",
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
    public function store (StoreTypePeriodRequest $request);

    /**
     * @OA\Get(
     *   path="/api/typePeriods/{typePeriod}",
     *   tags={"Tipos de periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un periodo",
     *   description="Muestra información específica de un tipo de periodo.",
     *   operationId="showTypePeriod",
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
     *     name="typePeriod",
     *     description="Tipo de periodo",
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
    public function show(Request $request,$typePeriod);

    /**
     * @OA\Put(
     *   path="/api/typePeriods/{typePeriod}",
     *   tags={"Tipos de periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar un tipo de periodo",
     *   description="Actualizar la información de un tipo de periodo.",
     *   operationId="updateTypePeriod",
     *   @OA\Parameter(
     *     name="typePeriod",
     *     description="Id del tipo de periodo",
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
     *           property="tp_name",
     *           description="Nombre del tipo de periodo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tp_description",
     *           description="Descripción asociada al nuevo tipo de periodo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de periodo",
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
    public function update(StoreTypePeriodRequest $request, TypePeriod $typePeriod);

     /**
     * @OA\Delete(
     *   path="/api/typePeriods/{typePeriod}",
     *   tags={"Tipos de periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un tipo de periodo",
     *   description="Eliminar un  tipo de periodo",
     *   operationId="deleteTypePeriod",
     *   @OA\Parameter(
     *     name="typePeriod",
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
    public function destroy(TypePeriod $typePeriod);

}
