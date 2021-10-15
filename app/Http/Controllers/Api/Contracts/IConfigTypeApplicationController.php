<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\ConfigTypeApplicationRequest;
use App\Models\ConfigTypeApplication;
use Illuminate\Http\Request;

interface IConfigTypeApplicationController
{
    /**
     * @OA\Get(
     *   path="/api/config-type-application",
     *   tags={"Configuracion Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las configuraciones de tipos solicitudes",
     *   description="Muestra todas las configuraciones de los tipos de solicitudes en formato JSON",
     *   operationId="getAllConfigTypeApplication",
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
     *   path="/api/config-type-application",
     *   tags={"Configuracion Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una configuracion tipo de solicitud",
     *   description="Crear una nueva configuracion para un tipo de solicitud.",
     *   operationId="addConfigTypeApplication",
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
     *           property="conf_typ_description",
     *           description="Descripcion de la configuracion del tipo de solicitud",
     *           type="string",
     *           example="Homologacion interna - id malla actual",
     *         ),
     *         @OA\Property(
     *           property="conf_typ_data_type",
     *           description="Tipo de dato de la configuracion",
     *           type="string",
     *           example="integer",
     *         ),
     *         @OA\Property(
     *           property="conf_typ_object_name",
     *           description="nombre del Modelo al que se aplica la configuracion (ej: Curriculum, SubjectCurriculum)",
     *           type="string",
     *           example="Curriculum",
     *         ),
     *         @OA\Property(
     *           property="conf_typ_object_id",
     *           description="campo al que se referencia dentro del modelo antes mencionado",
     *           type="string",
     *           example="id",
     *         ),
     *         @OA\Property(
     *           property="file_path",
     *           description="ruta del archivo (si existe).",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_application_id",
     *           description="ID del tipo de solicitud",
     *           type="integer",
     *           example="3",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo solicitud",
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
     *              "conf_typ_description" : "nullable|string",
     *              "conf_typ_data_type" : "nullable|string",
     *              "conf_typ_object_name" : "nullable|string",
     *              "conf_typ_object_id" : "nullable|string",
     *              "conf_typ_file_path" : "nullable|string",
     *              "type_application_id" : "required|exists:tenant.type_application,id",
     *              "status_id" : "required|exists:tenant.status,id"
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(ConfigTypeApplicationRequest $request);

    /**
     * @OA\Get(
     *   path="/api/config-type-application/{id}",
     *   tags={"Configuracion Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una configuracion tipo solicitud",
     *   description="Muestra información específica de una configuracion tipo de solicitud por Id.",
     *   operationId="getConfigTypeApplication",
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
     *     description="Id de la configuracion tipo solicitud",
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
     *   path="/api/config-type-application/{configtypeapplication}",
     *   tags={"Configuracion Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar configuracion tipo solicitud",
     *   description="Actualizar una configuracion de un tipo solicitud.",
     *   operationId="updateConfigTypeApplication",
     *   @OA\Parameter(
     *     name="configtypeapplication",
     *     description="Id de la configuracion de tipo de solicitud",
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
     *           property="conf_typ_description",
     *           description="Descripcion de la configuracion del tipo de solicitud",
     *           type="string",
     *           example="Homologacion interna - id malla actual"
     *         ),
     *         @OA\Property(
     *           property="conf_typ_data_type",
     *           description="Tipo de dato de la configuracion",
     *           type="string",
     *           example="integer"
     *         ),
     *         @OA\Property(
     *           property="conf_typ_object_name",
     *           description="nombre del Modelo al que se aplica la configuracion (ej: Curriculum, SubjectCurriculum)",
     *           type="string",
     *           example="Curriculum"
     *         ),
     *         @OA\Property(
     *           property="conf_typ_object_id",
     *           description="campo al que se referencia dentro del modelo antes mencionado",
     *           type="string",
     *           example="id"
     *         ),
     *         @OA\Property(
     *           property="file_path",
     *           description="ruta del archivo (si existe).",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_application_id",
     *           description="ID del tipo de solicitud",
     *           type="integer",
     *           example="3"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo solicitud",
     *           type="integer",
     *           example="1",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "conf_typ_description" : "nullable|string",
     *              "conf_typ_data_type" : "nullable|string",
     *              "conf_typ_object_name" : "nullable|string",
     *              "conf_typ_object_id" : "nullable|string",
     *              "conf_typ_file_path" : "nullable|string",
     *              "type_application_id" : "required|exists:tenant.type_application,id",
     *              "status_id" : "required|exists:tenant.status,id"
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(ConfigTypeApplicationRequest $request, ConfigTypeApplication $configtypeapplication);

    /**
     * @OA\Delete(
     *   path="/api/config-type-application/{configtypeapplication}",
     *   tags={"Configuracion Tipo Solicitud"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar configuracion tipo solicitud",
     *   description="Eliminar una configuracion de tipo de solicitud por Id",
     *   operationId="deleteConfigTypeApplication",
     *   @OA\Parameter(
     *     name="configtypeapplication",
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
    public function destroy(ConfigTypeApplication $typeapplication);
}
