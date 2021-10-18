<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\TypeApplicationRequest;
use App\Http\Requests\TypeApplicationStatusRequest;
use App\Models\TypeApplication;
use App\Models\TypeApplicationStatus;
use Illuminate\Http\Request;

interface ITypeApplicationStatusController
{
    /**
     * @OA\Get(
     *   path="/api/type-application-status",
     *   tags={"Estado Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los estados de tipos de solicitudes",
     *   description="Muestra todas las configuraciones de los tipos de solicitudes en formato JSON",
     *   operationId="getAllTypeApplicationStatus",
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
     *   path="/api/type-application-status",
     *   tags={"Estado Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un estado tipo de solicitud",
     *   description="Crear un nuevo tipo de configuracion para tipo de solicitud.",
     *   operationId="addTypeApplicationStatus",
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
     *           property="type_application_id",
     *           description="ID del tipo solicitud",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de configuracion del tipo solicitud (Solo estados pertenecientes a la categoria 'Documentos')",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="roles",
     *           description="Array de objetos tipo role que se vincularan al estado",
     *           type="array",
     *           items={
     *               "type" : "object",
     *               "properties" : {
     *                   "role_id" : {
     *                       "type" : "integer",
     *                       "example" : "1",
     *                   },
     *               }
     *           },
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "order" : "required|integer",
     *              "type_application_id" : "required|exists:tenant.type_applications,id",
     *              "status_id" : "required|exists:tenant.status,id",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(TypeApplicationStatusRequest $request);

    /**
     * @OA\Get(
     *   path="/api/type-application-status/{id}",
     *   tags={"Estado Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un estado tipo solicitud",
     *   description="Muestra información específica de la configuracion de un tipo de solicitud por Id.",
     *   operationId="getTypeApplicationStatus",
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
     * @OA\Put(
     *   path="/api/type-application-status/{tas}",
     *   tags={"Estado Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar estado tipo solicitud",
     *   description="Actualizar una configuracion de estado del tipo solicitud.",
     *   operationId="updateTypeApplicationStatus",
     *   @OA\Parameter(
     *     name="tas",
     *     description="Id del estado del tipo de solicitud",
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
     *           property="type_application_id",
     *           description="ID del tipo solicitud",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de configuracion del tipo solicitud (Solo estados pertenecientes a la categoria Documentos)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="roles",
     *           description="Array de objetos tipo role que se vincularan al estado",
     *           type="array",
     *           items={
     *               "type" : "object",
     *               "properties" : {
     *                   "role_id" : {
     *                       "type" : "integer",
     *                       "example" : "1",
     *                   },
     *               }
     *           },
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "order" : "required|integer",
     *              "type_application_id" : "required|exists:tenant.type_applications,id",
     *              "status_id" : "required|exists:tenant.status,id",
     *              "roles" : "required|array",
     *              "roles.*.role_id" : "required|exists:tenant.roles,id"
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(TypeApplicationStatusRequest $request, TypeApplicationStatus $typeapplication);

    /**
     * @OA\Delete(
     *   path="/api/type-application-status/{tas}",
     *   tags={"Estado Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un estado tipo solicitud",
     *   description="Eliminar una configuracion de estado del tipo de solicitud por Id",
     *   operationId="deleteTypeApplicationStatus",
     *   @OA\Parameter(
     *     name="tas",
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
    public function destroy(TypeApplicationStatus $typeapplication);
}
