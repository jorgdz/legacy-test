<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\StorePermissionRequest;

interface IPermissionController
{
    /**
     * @OA\Get(
     *   path="/api/permissions",
     *   tags={"Permisos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los permisos",
     *   description="Muestra todas los permisos en formato JSON",
     *   operationId="getAllPermissions",
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
     *   path="/api/permissions",
     *   tags={"Permisos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear permiso",
     *   description="Crear un nuevo permiso.",
     *   operationId="addPermission",
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
     *           description="Nombre del permiso",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="alias",
     *           description="Alias del permiso",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="parent_name",
     *           description="Grupo al que pertenece el permiso",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="Descripcion del permiso",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del permiso",
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
    public function store(StorePermissionRequest $request);

    /**
     * @OA\Get(
     *   path="/api/permissions/{id}",
     *   tags={"Permisos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un permiso",
     *   description="Muestra información específica de un permiso por Id.",
     *   operationId="getPermissions",
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
     *     description="Id del permiso",
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
     *   path="/api/permissions/{permission}",
     *   tags={"Permisos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar permiso",
     *   description="Actualizar un permiso.",
     *   operationId="updatePermissions",
     *   @OA\Parameter(
     *     name="permission",
     *     description="Id del permiso",
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
     *           property="parent_name",
     *           description="Grupo al que pertenece el permiso",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="Descripcion del permiso",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del permiso",
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
    public function update(Request $request, Permission $permission);

    /**
     * @OA\Delete(
     *   path="/api/permissions/{permission}",
     *   tags={"Permisos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un permiso",
     *   description="Eliminar una permiso por Id",
     *   operationId="deletePermissions",
     *   @OA\Parameter(
     *     name="permission",
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
    public function destroy(Permission $permission);

    /**
     * @OA\Get(
     *   path="/api/permissions-grouped",
     *   tags={"Permisos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los permisos por grupos",
     *   description="Muestra todas los permisos por grupos en formato JSON",
     *   operationId="getAllGroupPermissions",
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
    public function showPermissionsGrouped(Request $request);
}
