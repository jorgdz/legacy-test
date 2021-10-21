<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;

interface IApplicationController
{
    /**
     * @OA\Get(
     *   path="/api/application",
     *   tags={"Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las solicitudes",
     *   description="Muestra tadas las solicitudes en formato JSON",
     *   operationId="getAllApplication",
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
     *   path="/api/application",
     *   tags={"Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una solicitud",
     *   description="Crear una nueva solicitud.",
     *   operationId="addApplication",
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
     *           property="app_description",
     *           description="Descripcion de la solicitud",
     *           type="string",
     *           example="prueba free"
     *         ),
     *         @OA\Property(
     *           property="typ_app_acronym",
     *           description="Acronimo del tipo de solicitud",
     *           type="string",
     *           example="CAMCAR-0000001"
     *         ),
     *         @OA\Property(
     *           property="details",
     *           description="Array de valores del detalle de la solicitud segun el tipo de la solicitud (Tomar como referencia la configuracion del tipo de la solicitud, se debe enviar el ID de esa configuracion en config_type_application_id)",
     *           type="array",
     *           items={
     *               "type" : "object",
     *               "properties" : {
     *                   "value" : {
     *                       "type" : "string",
     *                       "example" : "1",
     *                   },
     *                   "config_type_application_id" : {
     *                       "type" : "integer",
     *                       "example" : "1",
     *                   },
     *               }
     *           },
     *         ),
     *         @OA\Property(
     *           property="role_id",
     *           description="Rol actual que el usuario esta usando",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "app_description": "nullable|string",
     *              "app_register_date": "nullable|date",
     *              "typ_app_acronym": "required|string",
     *              "details" : "required|array",
     *              "details.*.config_type_application_id" : "required|integer|exists:tenant.config_type_applications,id",
     *              "role_id" : "required|integer|exists:tenant.roles,id",
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
    public function store(ApplicationRequest $request);

    /**
     * @OA\Get(
     *   path="/api/application/{id}",
     *   tags={"Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una solicitud",
     *   description="Muestra información específica de una solicitud por Id.",
     *   operationId="getApplication",
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
     *     description="Id de la solicitud",
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
     *   path="/api/application/{application}",
     *   tags={"Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar solicitud",
     *   description="Actualizar una solicitud.",
     *   operationId="updateApplication",
     *   @OA\Parameter(
     *     name="application",
     *     description="Id de la solicitud",
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
     *           property="app_description",
     *           description="Descripcion de la solicitud",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status",
     *           description="Id del estado",
     *           type="integer",
     *           example="1"
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "app_description": "nullable|string",
     *              "app_register_date": "nullable|date",
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
    public function update(ApplicationRequest $request, Application $application);

    /**
     * @OA\Delete(
     *   path="/api/application/{application}",
     *   tags={"Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una solicitud",
     *   description="Eliminar una solicitud por Id",
     *   operationId="deleteApplication",
     *   @OA\Parameter(
     *     name="application",
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
    public function destroy(Application $application);

    /**
     * @OA\Get(
     *   path="/api/application/{role}/get-all-aplications",
     *   tags={"Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener estados solicitudes",
     *   description="Muestra información de todas las transacciones de todas las solicitudes segun el rol del usuario (retorna las solicitudes que el rol proporcionado puede o pudo alterar)",
     *   operationId="getAllApplicationStatus",
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
     *     name="role",
     *     description="Role actual del usuario",
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
    public function getAllApplicationStatus($role);

    /**
     * @OA\Get(
     *   path="/api/application/show-application-status/{code}",
     *   tags={"Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un historial de solicitud",
     *   description="Muestra información del historial de estados de una solicitud especifica por su codigo.",
     *   operationId="getApplicationHistoryStatus",
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
     *     name="code",
     *     description="Codigo de la solicitud",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="string",
     *       example="003-0000001"
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
    public function showApplicationStatus($code);

    /**
     * @OA\Post(
     *   path="/api/application/change-status",
     *   tags={"Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Cambiar estado de una solicitud",
     *   description="Cambiar el estado de una solicitud o rechazarla.",
     *   operationId="changeApplicationStatus",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="app_code",
     *           description="Codigo de la solicitud que se actualizara",
     *           type="string",
     *           example="003-0000001",
     *         ),
     *         @OA\Property(
     *           property="comment",
     *           description="Comentario y/o observaciones sobre el cambio de estado",
     *           type="string",
     *           example="este me cae mal; reprueba"
     *         ),
     *         @OA\Property(
     *           property="refused",
     *           description="Rechazar solicitud (1 para rechazado, 0 o NULL para siguiente estado)",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="role_id",
     *           description="Rol actual que el usuario esta usando",
     *           type="integer",
     *           example="1",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "app_code" : "required|exists:tenant.applications,app_code",
     *              "role_id"  : "required|exists:tenant.roles,id",
     *              "comment"  : "required|string",
     *              "refused"  : "nullable|boolean",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function changeApplicationStatus(Request $request);
}
