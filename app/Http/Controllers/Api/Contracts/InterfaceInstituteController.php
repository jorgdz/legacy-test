<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\InstituteRequest;
use App\Models\Institute;
use Illuminate\Http\Request;

interface InterfaceInstituteController
{
    /**
     * @OA\Get(
     *   path="/api/institutes",
     *   tags={"Institutos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los institutos",
     *   description="Muestra todos los institutos en formato JSON",
     *   operationId="getAllInstitutes",
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
     *   path="/api/institutes",
     *   tags={"Institutos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un instituto",
     *   description="Crear un nuevo instituto.",
     *   operationId="addInstitute",
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
     *           property="inst_name",
     *           description="Nombre del instituto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="city_id",
     *           description="Ciudad del instituto",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_institute_id",
     *           description="Tipo de instituto",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del instituto",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "inst_name" : "required",
     *          "city_id"   : "required|integer|exists:tenant.cities,id",
     *          "status_id" : "required|integer|exists:tenant.status,id",
     *          "type_institute_id" : "required|integer|exists:tenant.type_institutes,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(InstituteRequest $request);

    /**
     * @OA\Get(
     *   path="/api/institutes/{id}",
     *   tags={"Institutos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un instituto",
     *   description="Muestra información específica de un instituto por Id.",
     *   operationId="getInstitutes",
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
     *     description="Id del instituto",
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
     *   path="/api/institutes/{institute}",
     *   tags={"Institutos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar instituto",
     *   description="Actualizar un instituto.",
     *   operationId="updateInstitute",
     *   @OA\Parameter(
     *     name="institute",
     *     description="Id del instituto",
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
     *           property="inst_name",
     *           description="Nombre del instituto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="city_id",
     *           description="Ciudad del instituto",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_institute_id",
     *           description="Tipo de instituto",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del instituto",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "inst_name" : "required",
     *          "city_id"   : "required|integer",
     *          "status_id" : "required|integer",
     *          "type_institute_id" : "required|integer|exists:tenant.type_institutes,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(InstituteRequest $request, Institute $institute);

    /**
     * @OA\Delete(
     *   path="/api/institutes/{institute}",
     *   tags={"Institutos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un instituto",
     *   description="Eliminar un instituto por Id",
     *   operationId="deleteInstitutes",
     *   @OA\Parameter(
     *     name="institute",
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
    public function destroy(Institute $institute);
}
