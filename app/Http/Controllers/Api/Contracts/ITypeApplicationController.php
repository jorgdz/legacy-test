<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\TypeApplicationRequest;
use App\Models\TypeApplication;
use Illuminate\Http\Request;

interface ITypeApplicationController
{
    /**
     * @OA\Get(
     *   path="/api/type-application",
     *   tags={"Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de solicitudes",
     *   description="Muestra todos los tipos de solicitudes en formato JSON",
     *   operationId="getAllTypeApplication",
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
     *   path="/api/type-application",
     *   tags={"Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un tipo de solicitud",
     *   description="Crear un nuevo tipo de solicitud.",
     *   operationId="addTypeApplication",
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
     *           property="typ_app_name",
     *           description="Nombre del tipo de solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_app_description",
     *           description="Descripcion del tipo de solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_app_acronym",
     *           description="Acronimo del tipo de solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="parent_id",
     *           description="padre del tipo de solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo solicitud",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "typ_app_name": "required|string|unique:tenant.type_application,typ_app_name",
     *              "typ_app_description": "nullable|string",
     *              "typ_app_acronym": "nullable|string|unique:tenant.type_application,typ_app_acronym",
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
    public function store(TypeApplicationRequest $request);

    /**
     * @OA\Get(
     *   path="/api/type-application/{id}",
     *   tags={"Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo solicitud",
     *   description="Muestra información específica de un tipo de solicitud por Id.",
     *   operationId="getTypeApplication",
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
     *     description="Id del tipo de solicitud",
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
     * @OA\Get(
     *   path="/api/type-application/{acronym}/children",
     *   tags={"Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo de solicitud por su acronimo",
     *   description="Muestra información específica de un catalogo por acronimo.",
     *   operationId="getTypeApplicationByAcronym",
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
     *     name="acronym",
     *     description="acronimo del tipo de solicitud",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="string",
     *       example="VV"
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
    public function getChildren(string $acronym);

    /**
     * @OA\Put(
     *   path="/api/type-application/{typeapplication}",
     *   tags={"Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar tipo solicitud",
     *   description="Actualizar un tipo solicitud.",
     *   operationId="updateTypeApplication",
     *   @OA\Parameter(
     *     name="typeapplication",
     *     description="Id del tipo de solicitud",
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
     *           property="typ_app_name",
     *           description="Nombre del tipo de solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_app_description",
     *           description="Descripcion del tipo de solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_app_acronym",
     *           description="Acronimo del tipo de solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="parent_id",
     *           description="padre del tipo de solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de solicitud",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "typ_app_name": "required|string|unique:tenant.type_application,typ_app_name",
     *              "typ_app_description": "nullable|string",
     *              "typ_app_acronym": "nullable|string|unique:tenant.type_application,typ_app_acronym",
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
    public function update(TypeApplicationRequest $request, TypeApplication $typeapplication);

    /**
     * @OA\Delete(
     *   path="/api/type-application/{typeapplication}",
     *   tags={"Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un tipo solicitud",
     *   description="Eliminar un tipo de solicitud por Id",
     *   operationId="deleteTypeApplication",
     *   @OA\Parameter(
     *     name="typeapplication",
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
    public function destroy(TypeApplication $typeapplication);
}
