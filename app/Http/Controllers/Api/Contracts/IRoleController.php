<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

interface IRoleController
{
    /**
     * @OA\Get(
     *   path="/api/roles",
     *   tags={"Roles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los roles",
     *   description="Muestra todas los roles en formato JSON",
     *   operationId="getAllRoles",
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
     *   path="/api/roles",
     *   tags={"Roles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear rol",
     *   description="Crear un nuevo rol.",
     *   operationId="addRole",
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
     *           description="Nombre del rol",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="keyword",
     *           description="Palabra clave del rol",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="Descripcion del rol",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del rol",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "name"      : "required|string|unique:tenant.roles,name",
     *           "keyword"   : "required|string|unique:tenant.roles,keyword",
     *           "status_id" : "required|integer|unique:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StoreRoleRequest $request);

    /**
     * @OA\Get(
     *   path="/api/roles/{id}",
     *   tags={"Roles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un rol",
     *   description="Muestra información específica de un rol por Id.",
     *   operationId="getRoles",
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
     *     description="Id del rol",
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
     *   path="/api/roles/{role}",
     *   tags={"Roles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar rol",
     *   description="Actualizar un rol.",
     *   operationId="updateRoles",
     *   @OA\Parameter(
     *     name="role",
     *     description="Id del rol",
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
     *           description="Nombre del rol",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="keyword",
     *           description="Palabra clave del rol",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="Descripcion del rol",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del rol",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="add_permissions",
     *           type="array",
     *           @OA\Items(
     *             type="string",
     *             example="institutetype-obtener-tipo-de-instituto",
     *           ),
     *           description="Asignar los permisos al rol",
     *         ),
     *         @OA\Property(
     *           property="del_permissions",
     *           type="array",
     *           @OA\Items(
     *             type="string",
     *             example="institutetype-crear-tipo-de-instituto"
     *           ),
     *           description="eliminar los permisos al rol",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "name"      : "required|string",
     *           "keyword"   : "required|string",
     *           "status_id" : "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateRoleRequest $request, Role $role);

    /**
     * @OA\Delete(
     *   path="/api/roles/{role}",
     *   tags={"Roles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un rol",
     *   description="Eliminar una rol por Id",
     *   operationId="deleteRoles",
     *   @OA\Parameter(
     *     name="role",
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
    public function destroy(Role $role);
}
