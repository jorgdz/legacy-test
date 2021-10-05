<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\PositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;

interface IPositionController
{

    /**
     * @OA\Get(
     *   path="/api/positions",
     *   tags={"Cargos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los cargos",
     *   description="Muestra todos los cargos en formato JSON",
     *   operationId="getAllPositions",
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
     *   path="/api/positions",
     *   tags={"Cargos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un cargo",
     *   description="Crear un nuevo cargo.",
     *   operationId="addPosition",
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
     *           property="pos_name",
     *           description="Nombre del cargo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pos_description",
     *           description="Descripcion del cargo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pos_keyword",
     *           description="Palabra clave del cargo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="role_id",
     *           description="ID del role",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="department_id",
     *           description="ID del departamento",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="ID del estado",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "pos_name" : "required|unique:tenant.positions,pos_name",
     *          "pos_keyword"    : "required|string|max:255|unique:tenant.roles,keyword",
     *          "role_id" : "integer|exists:tenant.roles,id",
     *          "department_id" : "integer|exists:tenant.departments,id",
     *          "status_id" : "integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(PositionRequest $request);

    /**
     * @OA\Get(
     *   path="/api/positions/{id}",
     *   tags={"Cargos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un cargo",
     *   description="Muestra información específica de un cargo por Id.",
     *   operationId="getPosition",
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
     *     description="Id del cargo",
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
     *   path="/api/positions/{position}",
     *   tags={"Cargos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar cargo",
     *   description="Actualizar un cargo.",
     *   operationId="updatePosition",
     *   @OA\Parameter(
     *     name="position",
     *     description="Id del cargo",
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
     *           property="pos_name",
     *           description="Nombre del cargo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pos_description",
     *           description="Descripcion del cargo",
     *           type="string",
     *         ),
     *        @OA\Property(
     *           property="pos_keyword",
     *           description="Palabra clave del cargo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="role_id",
     *           description="ID del role",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="department_id",
     *           description="ID del departamento",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="ID del estado",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "pos_name" : "required|unique:tenant.positions,pos_name,{$this->route('position')->id}",
     *          "pos_keyword"    : "required|string|max:255|unique:tenant.positions,pos_keyword,{$this->route('position')->id}",
     *          "role_id" : "integer|exists:tenant.roles,id",
     *          "department_id" : "integer|exists:tenant.departments,id",
     *          "status_id" : "integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdatePositionRequest $request, Position $position);

    /**
     * @OA\Delete(
     *   path="/api/positions/{position}",
     *   tags={"Cargos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un cargo",
     *   description="Eliminar un cargo por Id",
     *   operationId="deletePosition",
     *   @OA\Parameter(
     *     name="position",
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
    public function destroy(Position $person);
}
