<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\UpdateLogoCurrentTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\CustomTenant;
use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;

interface ITenantController
{

    /**
     * @OA\Get(
     *   path="/api/tenants",
     *   tags={"Inquilinos (Endpoints del dueño de la aplicación)"},
     *   security={},
     *   summary="Listar los inquilinos",
     *   description="Muestra todos los inquilinos paginados en formato JSON",
     *   operationId="getAllTenants",
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
     *   path="/api/tenants",
     *   tags={"Inquilinos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear inquilino",
     *   description="Crear un nuevo inquilino.",
     *   operationId="addTenant",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="name",
     *           description="Nombre del inquilino",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="domain",
     *           description="Dominio del inquilino",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="domain_client",
     *           description="Dominio cliente del inquilino",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="database",
     *           description="Base de datos del inquilino",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="description",
     *           description="Descripcion de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="website",
     *           description="Sitio web de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="assigned_site",
     *           description="Sitio asignado de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="facebook",
     *           description="Facebook de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="instagram",
     *           description="Instagram de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="linkedin",
     *           description="Linkedin de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="youtube",
     *           description="Youtube de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="info_mail",
     *           description="Correo de información de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="matrix",
     *           description="Matriz de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="color",
     *           description="Color de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="students_number",
     *           description="Número de estudiantes matriculados",
     *           type="string",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "name": "required|string",
     *          "domain": "required|string",
     *          "domain_client": "required|string",
     *          "description": "string",
     *          "website": "string",
     *          "assigned_site": "string",
     *          "facebook": "string",
     *          "instagram": "string",
     *          "linkedin": "string",
     *          "youtube": "string",
     *          "info_mail": "required|email|unique|string",
     *          "matrix": "string",
     *          "domain_client": "string",
     *          "color": "string",
     *          "students_number": "string",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(Request $request);

    /**
     * @OA\Get(
     *   path="/api/tenants/{tenant}",
     *   tags={"Inquilinos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un inquilino",
     *   description="Muestra información específica de un inquilino.",
     *   operationId="getTenant",
     *   @OA\Parameter(
     *     name="tenant",
     *     description="Id del inquilino",
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
    public function show(CustomTenant $tenant);

    /**
     * @OA\Put(
     *   path="/api/tenants/{tenant}",
     *   tags={"Inquilinos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar un inquilino",
     *   description="Actulizar un inquilino específico por Id",
     *   operationId="editTenant",
     *   @OA\Parameter(
     *     name="tenant",
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
     *           property="name",
     *           description="Nombre del inquilino",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="domain",
     *           description="Dominio del inquilino",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="domain_client",
     *           description="Dominio cliente del inquilino",
     *           type="string",
     *         ),
     *        @OA\Property(
     *           property="description",
     *           description="Descripcion de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="website",
     *           description="Sitio web de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="assigned_site",
     *           description="Sitio asignado de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="facebook",
     *           description="Facebook de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="instagram",
     *           description="Instagram de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="linkedin",
     *           description="Linkedin de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="youtube",
     *           description="Youtube de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="info_mail",
     *           description="Correo de información de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="matrix",
     *           description="Matriz de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="color",
     *           description="Color de tenant",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="students_number",
     *           description="Número de estudiantes matriculados",
     *           type="string",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "name": "required|string",
     *          "domain": "required|string",
     *          "domain_client": "required|string",
     *          "description": "string",
     *          "website": "string",
     *          "assigned_site": "string",
     *          "facebook": "string",
     *          "instagram": "string",
     *          "linkedin": "string",
     *          "youtube": "string",
     *          "info_mail": "required|email|unique|string",
     *          "matrix": "string",
     *          "domain_client": "string",
     *          "color": "string",
     *          "students_number": "string",
     *      },
     *   )),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(Request $request, $tenant);

    /**
     * @OA\Delete(
     *   path="/api/tenants/{tenant}",
     *   tags={"Inquilinos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un inquilino",
     *   description="Eliminar un inquilino específico por Id",
     *   operationId="deleteTenant",
     *   @OA\Parameter(
     *     name="tenant",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function destroy(CustomTenant $tenant);

    /**
     * @OA\Post(
     *   path="/api/tenants/edit",
     *   tags={"Inquilinos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Editar información inquilino actual",
     *   description="Editar información inquilino actual",
     *   operationId="editCurrentTenant",
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
     *           property="name",
     *           description="Nombre del inquilino",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="transport",
     *           description="Transporte (Configuracion para el correo)",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="host",
     *           description="Host (Configuracion para el correo)",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="port",
     *           description="Puerto (Configuracion para el correo)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="encryption",
     *           description="Encriptación (Configuracion para el correo)",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="username",
     *           description="Nombre de usuario (Configuracion para el correo)",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="password",
     *           description="Contraseña (Configuracion para el correo)",
     *           type="string",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "name"   :  "required|max:255|string|unique:landlord.tenants,name,tenant->id",
     *          "transport"   : "required|string|max:255",
     *          "host"   : "required|string|max:255",
     *          "port"   : "required|string|max:255",
     *          "encryption"   : "required|string|max:255",
     *          "username"   : "required|max:255|string|unique:landlord.mails,username,tenant->mail->id",
     *          "password"   : "required|max:255|string|unique:landlord.mails,password,tenant->mail->id",            
     *      },
     *   )),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function updateCurrentTenant(UpdateTenantRequest $request);

    /**
     * @OA\Post(
     *   path="/api/tenants/logo",
     *   tags={"Inquilinos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Cambiar logo del inquilino",
     *   description="Editar el logo del inquilino actual",
     *   operationId="editLogoCurrentTenant",
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
     *           property="files[]",
     *           description="Logo del inquilino",
     *           type="array",
     *           @OA\Items(
     *              type="file"
     *           ),
     *         ),
     *         @OA\Property(
     *           property="period",
     *           description="Periodo de actualizacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_document",
     *           description="tipo de documento",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "files" : "required|file",
     *          "period" : "integer",
     *          "type_document" : "required|integer|exists:landlord.type_documents,id"
     *      },
     *   )),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function updateLogoCurrentTenant(UpdateLogoCurrentTenantRequest $request);

    /**
     * @OA\Put(
     *   path="/api/restore-tenant/{id}",
     *   tags={"Inquilinos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Restaurar a un inquilino",
     *   description="Restaura a un inquilino específico.",
     *   operationId="restoreTenant",
     *   @OA\Parameter(
     *     name="id",
     *     description="Id del inquilino",
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
    public function restoreTenant($id);
}
