<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;

interface IAreaController
{
    /**
     * @OA\Get(
     *   path="/api/areas",
     *   tags={"Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las areas",
     *   description="Muestra todos las areas en formato JSON",
     *   operationId="getAllAreas",
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
     *     name="data",
     *     description="mostrar todos los datos sin paginacion (enviar all)",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="search",
     *     description="Filtrar registros por el campo sigla (solamente usar cuando se envia data/all)",
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
     *   path="/api/areas",
     *   tags={"Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una area",
     *   description="Crear una nueva area.",
     *   operationId="addArea",
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
     *           property="ar_name",
     *           description="Nombre de la area",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="ar_description",
     *           description="Descripcion de la area",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="ar_keywords",
     *           description="Keyword del área",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del catalogo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *      @OA\JsonContent(
     *          example={
     *              "ar_name": "required|string|unique:tenant.areas,ar_name",
     *              "ar_description": "nullable|string",
     *              "ar_keywords": "required|string|unique:tenant.areas,ar_keywords",
     *              "status_id": "required|integer|exists:tenant.status,id",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(AreaRequest $request);

    /**
     * @OA\Get(
     *   path="/api/areas/{id}",
     *   tags={"Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una area",
     *   description="Muestra información específica de una area por Id.",
     *   operationId="getArea",
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
     *     description="Id de la area",
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
     *   path="/api/areas/{area}",
     *   tags={"Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar area",
     *   description="Actualizar una area.",
     *   operationId="updateArea",
     *   @OA\Parameter(
     *     name="area",
     *     description="Id de la area",
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
     *           property="ar_name",
     *           description="Nombre de la area",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="ar_description",
     *           description="Descripcion de la area",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="ar_keywords",
     *           description="Keyword del área",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del catalogo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *      @OA\JsonContent(
     *          example={
     *              "ar_name": "required|string|unique:tenant.areas,ar_name",
     *              "ar_description": "nullable|string",
     *              "ar_keywords": "required|string|unique:tenant.areas,ar_keywords",
     *              "status_id": "required|integer|exists:tenant.status,id",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(AreaRequest $request, Area $area);

    /**
     * @OA\Delete(
     *   path="/api/areas/{area}",
     *   tags={"Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una area",
     *   description="Eliminar una area por Id",
     *   operationId="deleteArea",
     *   @OA\Parameter(
     *     name="area",
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
    public function destroy(Area $area);
}
