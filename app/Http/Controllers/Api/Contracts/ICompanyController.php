<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyFormRequest;

interface ICompanyController
{

    /**
     * @OA\Get(
     *   path="/api/companies",
     *   tags={"Compañias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las compañias",
     *   description="Muestra todas las compañias en formato JSON",
     *   operationId="getAllCompanies",
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
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index(Request $request);

    /**
     * @OA\Get(
     *   path="/api/companies/{id}",
     *   tags={"Compañias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una compañia",
     *   description="Muestra información específica de una compañia.",
     *   operationId="getCompany",
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
     *     description="Id de la compañia",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
     *   path="/api/companies/{company}",
     *   tags={"Compañias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar compañia",
     *   description="Actualizar una compañia.",
     *   operationId="updateCompany",
     *   @OA\Parameter(
     *     name="company",
     *     description="Id de la compañia",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
     *           property="co_name",
     *           description="Nombre de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_description",
     *           description="Descripcion de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_website",
     *           description="Sitio web de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_assigned_site",
     *           description="Sitio asignado de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_facebook",
     *           description="Facebook de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_instagram",
     *           description="Instagram de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_linkedin",
     *           description="Linkedin de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_youtube",
     *           description="Youtube de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_info_mail",
     *           description="Correo de información de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_matrix",
     *           description="Matriz de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_color",
     *           description="Color de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_pay_notification",
     *           description="Pago de notificación de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_ruc",
     *           description="Ruc de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_business_name",
     *           description="Razon social de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_comercial_name",
     *           description="Nombre comercial de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_legal_identification",
     *           description="Identificación legal de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_agent_legal",
     *           description="Representante legal de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_person_type",
     *           description="Tipo de persona de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_direction",
     *           description="Dirección de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_phone",
     *           description="Teléfono de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="co_email",
     *           description="Correo de la compañia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la compañia",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "co_name"    : "required",
     *          "co_ruc"    :  "required",
     *          "co_website" : "required",
     *          "co_email"   : "required:unique:tenant.companies,co_email,{$this->route('company')->id}",
     *          "status_id"  : "required",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(CompanyFormRequest $request, Company $company);
}
