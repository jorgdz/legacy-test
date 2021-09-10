<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\EconomicGroupRequest;
use App\Models\EconomicGroup;
use Illuminate\Http\Request;

interface IEconomicGroupController
{

    /**
     * @OA\Get(
     *   path="/api/economic-group",
     *   tags={"Grupo Economico"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los grupos economicos",
     *   description="Muestra todos los grupos economicos en formato JSON",
     *   operationId="getAllEconomicGroups",
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
     *   path="/api/economic-group",
     *   tags={"Grupo Economico"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear grupo economico",
     *   description="Crear un nuevo grupo economico.",
     *   operationId="addEconomicGroup",
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
     *           property="eco_gro_name",
     *           description="Nombre del grupo economico",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="eco_gro_description",
     *           description="Descripcion del grupo economico",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del grupo economico",
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

    public function store(EconomicGroupRequest $request);

    /**
     * @OA\Get(
     *   path="/api/economic-group/{id}",
     *   tags={"Grupo Economico"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un grupo economico",
     *   description="Muestra información específica de un grupo economico por Id.",
     *   operationId="getEconomicGroup",
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
     *     description="Id del grupo economico",
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
    public function show($ecogroup);

    /**
     * @OA\Put(
     *   path="/api/economic-group/{ecogroup}",
     *   tags={"Grupo Economico"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar grupo economico",
     *   description="Actualizar un grupo economico.",
     *   operationId="updateEconomicGroup",
     *   @OA\Parameter(
     *     name="ecogroup",
     *     description="Id del grupo economico",
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
     *           property="eco_gro_name",
     *           description="Nombre del grupo economico",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="eco_gro_description",
     *           description="Descripcion del grupo economico",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del paralelo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(EconomicGroupRequest $request, EconomicGroup $ecogroup);

    /**
     * @OA\Delete(
     *   path="/api/economic-group/{ecogroup}",
     *   tags={"Grupo Economico"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un grupo economico",
     *   description="Eliminar un grupo economico por Id",
     *   operationId="deleteEconomicGroup",
     *   @OA\Parameter(
     *     name="ecogroup",
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
    public function destroy(EconomicGroup $ecogroup);
}
