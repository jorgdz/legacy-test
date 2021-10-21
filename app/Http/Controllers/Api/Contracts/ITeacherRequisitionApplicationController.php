<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\TeacherRequisitionApplicationRequest;
use Illuminate\Http\Request;

interface ITeacherRequisitionApplicationController
{
    /**
     * @OA\Post(
     *   path="/api/applications/teacher-requisition",
     *   tags={"Requisicion de personal docente"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una solicitud requisicion docente",
     *   description="Crear una nueva solicitud de requisicion docente.",
     *   operationId="addTeacherRequisitionApplication",
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
     *           description="Descripcion de la solicitud de requisicion docente",
     *           type="string",
     *           example="prueba free"
     *         ),
     *         @OA\Property(
     *           property="json",
     *           description="Array de valores del detalle de la solicitud de requisicion personal docente (Tomar como referencia la configuracion del tipo de la solicitud).",
     *           type="array",
     *           items={
     *               "type" : "object",
     *               "properties" : {
     *                   "user_id_requisition" : {
     *                       "type" : "integer",
     *                       "example" : "1",
     *                   },
     *                   "coll_email" : {
     *                       "type" : "string",
     *                       "example" : "prueba@gmail.com",
     *                   },
     *                   "offer_id" : {
     *                       "type" : "integer",
     *                       "example" : "1",
     *                   },
     *                   "hourhand_id" : {
     *                       "type" : "integer",
     *                       "example" : "1",
     *                   },
     *                   "period_id" : {
     *                       "type" : "integer",
     *                       "example" : "1",
     *                   },
     *                   "education_level_id" : {
     *                       "type" : "integer",
     *                       "example" : "1",
     *                   },
     *               },
     *           },
     *          example="[{'user_id_requisition' : 1,'coll_email' : 'aaaaa@gmail.com','offer_id' : 1,'hourhand_id' : 1,'period_id' : 1,'education_level_id' : 1},{'tipo_vinculacion' : 0,'tipo_dedicacion' : 'TC'}]"
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
     *              "app_description"             : "nullable|string",
     *              "user_id"                     : "required|exists:tenant.users,id",
     *              "json"                        : "required|array",
     *              "json.0.user_id_requisition"  : "required|exists:tenant.users,id",
     *              "json.0.coll_email"           : "required|string|unique:tenant.collaborators,coll_email",
     *              "json.0.offer_id"             : "required|exists:tenant.offers,id",
     *              "json.0.hourhand_id"          : "required|exists:tenant.hourhands,id",
     *              "json.0.period_id"            : "required|exists:tenant.periods,id",
     *              "json.0.education_level_id"   : "required|exists:tenant.education_levels,id",
     *              "json.1.tipo_vinculacion"     : "required|boolean",
     *              "json.1.tipo_dedicacion"      : "required|string|in:TC,MT,PA",
     *              "role_id"                     : "required|exists:tenant.roles,id"
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(TeacherRequisitionApplicationRequest $request);

    /**
     * @OA\Post(
     *   path="/api/teacher-requisition/change-status",
     *   tags={"Requisicion de personal docente"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Cambiar estado de una solicitud de requisicion de docente",
     *   description="Cambiar el estado de una solicitud de requisicion de personal docente o rechazarla.",
     *   operationId="changeTeacherRequisitionApplicationStatus",
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
     *           example="REQDOC-0000007",
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
