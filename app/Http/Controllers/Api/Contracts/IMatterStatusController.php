<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\MatterStatus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMatterStatusRequest;

interface IMatterStatusController {

    /**
     * @OA\Get(
     *   path="/api/matter-status",
     *   tags={"Estado de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los estados de materias",
     *   description="Muestra todos los estados de materias en formato JSON",
     *   operationId="getAllMatterStatus",
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
     *   path="/api/matter-status",
     *   tags={"Estado de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un estado de materia",
     *   description="Crear un nuevo estado de materia.",
     *   operationId="addMatterStatus",
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
     *           property="name",
     *           description="Nombre del estado de materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="Descripción del estado de materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type",
     *           description="Tipo del estado de materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la materia",
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
    public function store(StoreMatterStatusRequest $request);

    /**
     * @OA\Get(
     *   path="/api/matter-status/{id}",
     *   tags={"Estado de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un estado de materia",
     *   description="Muestra información específica de un estado de materia por Id.",
     *   operationId="getMatterStatus",
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
     *     description="Id del estado de materia",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
     *   path="/api/matter-status/{matterStatus}",
     *   tags={"Estado de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar estado de materia",
     *   description="Actualizar un estado de materia.",
     *   operationId="updateMatterStatus",
     *   @OA\Parameter(
     *     name="matterStatus",
     *     description="Id del estado de materia",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
     *           property="name",
     *           description="Nombre del estado de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="Descripción del estado de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type",
     *           description="Tipo del estado de materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la materia",
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
    public function update(Request $request, MatterStatus $matterStatus);

    /**
     * @OA\Delete(
     *   path="/api/matter-status/{matterStatus}",
     *   tags={"Estado de Materias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un estado de materia",
     *   description="Eliminar un estado de materia por Id",
     *   operationId="deleteMatterStatus",
     *   @OA\Parameter(
     *     name="matterStatus",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
    public function destroy(MatterStatus $matterStatus);
}
