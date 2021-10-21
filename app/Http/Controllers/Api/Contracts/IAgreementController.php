<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\AgreementRequest;
use App\Models\Agreement;
use Illuminate\Http\Request;

interface IAgreementController
{
    /**
     * @OA\Get(
     *   path="/api/agreements",
     *   tags={"Convenios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los convenios",
     *   description="Muestra todas los convenios en formato JSON",
     *   operationId="getAllAgreements",
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
     *     name="status_id",
     *     description="Filtrar registros por estado",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="integer",
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
     *   path="/api/agreements",
     *   tags={"Convenios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear convenio",
     *   description="Crear un nuevo convenio.",
     *   operationId="addAgreement",
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
     *           property="agr_name",
     *           description="Nombre del convenio",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="agr_num_matter_homologate",
     *           description="Numero de materias a homologar",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="agr_start_date",
     *           description="fecha de inicio del convenio",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="agr_end_date",
     *           description="fecha de fin del convenio",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="institute_id",
     *           description="Id instituto",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del convenio",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "agr_name" : "required",
     *           "agr_num_matter_homologate" : "nullable|integer",
     *           "agr_start_date" : "required|date",
     *           "agr_end_date" : "required|date|after_or_equal:agr_start_date",
     *           "institute_id" : "integer|exists:tenant.institutes,id",
     *           "status_id" : "integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */

    public function store(AgreementRequest $request);

    /**
     * @OA\Get(
     *   path="/api/agreements/{id}",
     *   tags={"Convenios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un convenio",
     *   description="Muestra información específica de un convenio por Id.",
     *   operationId="getAgreement",
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
     *     description="Id del convenio",
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
     *   path="/api/agreements/{agreement}",
     *   tags={"Convenios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar convenio",
     *   description="Actualizar un convenio.",
     *   operationId="updateAgreement",
     *   @OA\Parameter(
     *     name="agreement",
     *     description="Id del convenio",
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
     *           property="agr_name",
     *           description="Nombre del convenio",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="agr_num_matter_homologate",
     *           description="Numero de materias a homologar",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="agr_start_date",
     *           description="fecha de inicio del convenio",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="agr_end_date",
     *           description="fecha de fin del convenio",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="institute_id",
     *           description="Id instituto",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del convenio",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "agr_name" : "required",
     *           "agr_num_matter_homologate" : "nullable|integer",
     *           "agr_start_date" : "required|date",
     *           "agr_end_date" : "required|date|after_or_equal:agr_start_date",
     *           "institute_id" : "integer|exists:tenant.institutes,id",
     *           "status_id" : "integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(AgreementRequest $request, Agreement $agreement);

    /**
     * @OA\Post(
     *   path="/api/agreements/{agreement}/enabled",
     *   tags={"Convenios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Activar un convenio",
     *   description="Activa un convenio por Id",
     *   operationId="enabledAgreement",
     *   @OA\Parameter(
     *     name="agreement",
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
    public function enabled(Agreement $agreement);


    /**
     * @OA\Post(
     *   path="/api/agreements/{agreement}/disabled",
     *   tags={"Convenios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Desactivar un convenio",
     *   description="Desactiva un convenio por Id",
     *   operationId="disabledAgreement",
     *   @OA\Parameter(
     *     name="agreement",
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
    public function disabled(Agreement $agreement);
}
