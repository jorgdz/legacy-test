<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Campus;
use Illuminate\Http\Request;
use App\Http\Requests\CampusFormRequest;

interface ICampusController
{

    /**
     * @OA\Get(
     *   path="/api/campus",
     *   tags={"Sedes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las sedes",
     *   description="Muestra todas las sedes en formato JSON",
     *   operationId="getAllCampus",
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
     *   @OA\Parameter(
     *     name="data",
     *     description="mostrar todos los datos sin paginacion (enviar all)",
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
     *   path="/api/campus",
     *   tags={"Sedes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear sede",
     *   description="Crear una nueva sede.",
     *   operationId="addCampus",
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
     *           property="cam_name",
     *           description="Nombre de la sede",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cam_description",
     *           description="Descripcion de la sede",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cam_direction",
     *           description="Direccion de la sede",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cam_initials",
     *           description="Siglas de la sede",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la sede",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *    @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *       "cam_name"          : "required",
     *       "cam_direction"     : "required",
     *       "cam_description"   : "string,nullable",
     *       "cam_initials"      : "string,nullable",
     *       "status_id"         : "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(CampusFormRequest $request);

    /**
     * @OA\Get(
     *   path="/api/campus/{id}",
     *   tags={"Sedes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una sede",
     *   description="Muestra información específica de una sede por Id.",
     *   operationId="getCampus",
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
     *     description="Id de la sede",
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
     *   path="/api/campus/{campus}",
     *   tags={"Sedes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar sede",
     *   description="Actualizar una sede.",
     *   operationId="updateCampus",
     *   @OA\Parameter(
     *     name="campus",
     *     description="Id de la sede",
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
     *           property="cam_name",
     *           description="Nombre de la sede",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cam_description",
     *           description="Descripcion de la sede",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cam_direction",
     *           description="Direccion de la sede",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="cam_initials",
     *           description="Siglas de la sede",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la sede",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *         "cam_name"          : "required",
     *         "cam_direction"     : "required",
     *         "cam_description"   : "string,nullable",
     *         "cam_initials"      : "string,nullable",
     *         "status_id"         : "required|integer|exists:tenant.status,id",
     *         "company_id"        : "required|integer|exists:tenant.companies,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(Request $request, Campus $campus);

    /**
     * @OA\Delete(
     *   path="/api/campus/{campus}",
     *   tags={"Sedes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una sede",
     *   description="Eliminar una sede por Id",
     *   operationId="deleteCampus",
     *   @OA\Parameter(
     *     name="campus",
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
    public function destroy (Campus $company);
}
