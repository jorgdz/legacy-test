<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Http\Requests\CatalogRequest;

interface ICatalogController
{
    /**
     * @OA\Get(
     *   path="/api/catalogs",
     *   tags={"Catalogo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los catalogos",
     *   description="Muestra todos los catalogos con sus hijos en formato JSON",
     *   operationId="getAllCatalogs",
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
     *   path="/api/catalogs",
     *   tags={"Catalogo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un catalogo",
     *   description="Crear un nuevo catalogo.",
     *   operationId="addCatalog",
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
     *           property="cat_name",
     *           description="Nombre del catalogo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cat_description",
     *           description="Descripcion del catalogo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cat_acronym",
     *           description="Siglas del catalogo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="parent_id",
     *           description="Relacion padre (ID de otro catalogo)",
     *           type="integer",
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
     *              "cat_name": "required|string|unique:tenant.catalogs,cat_name",
     *              "cat_acronym": "nullable|max:4",
     *              "parent_id": "nullable|integer|exists:tenant.catalogs,id",
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
    public function store(CatalogRequest $request);

    /**
     * @OA\Get(
     *   path="/api/catalogs/{id}",
     *   tags={"Catalogo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un catalogo",
     *   description="Muestra información específica de un catalogo por Id.",
     *   operationId="getCatalog",
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
     *     description="Id del catalogo",
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
     *   path="/api/catalogs/{catalog}",
     *   tags={"Catalogo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar catalogo",
     *   description="Actualizar un catalogo.",
     *   operationId="updateCatalog",
     *   @OA\Parameter(
     *     name="catalogo",
     *     description="Id del catalogo",
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
     *           property="cat_name",
     *           description="Nombre del catalogo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cat_description",
     *           description="Descripcion del catalogo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cat_acronym",
     *           description="Siglas del catalogo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="parent_id",
     *           description="Relacion padre (ID de otro catalogo)",
     *           type="integer",
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
     *              "cat_name": "required|string|unique:tenant.catalogs,cat_name",
     *              "cat_acronym": "nullable|max:4",
     *              "parent_id": "nullable|integer|exists:tenant.catalogs,id",
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
    public function update(CatalogRequest $request, Catalog $pensum);
}