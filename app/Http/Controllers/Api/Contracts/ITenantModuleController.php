<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Models\TenantModules;
use App\Http\Requests\TenantModuleRequest;

interface ITenantModuleController
{
    /**
     * @OA\Get(
     *   path="/api/tenant-modules",
     *   tags={"Asignacion Modulos (Endpoints del dueño de la aplicación)"},
     *   security={},
     *   summary="Listar los modulos asignados",
     *   description="Muestra todos los modulos asignados paginados en formato JSON",
     *   operationId="getAllTenantModules",
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
     *   path="/api/tenant-modules",
     *   tags={"Asignacion Modulos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear asignacion de un modulo a inquilino",
     *   description="Crear una nueva asignacion de modulo.",
     *   operationId="addTenantModule",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="tenant_id",
     *           description="Id del inquilino",
     *           type="integer",
     *           example="1"
     *         ),
     *         @OA\Property(
     *           property="module_id",
     *           description="Id del modulo",
     *           type="integer",
     *           example="1"
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "tenant_id": "required|integer|exists:landlord.tenants,id",
     *          "module_id": "required|integer|exists:landlord.modules,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(TenantModuleRequest $request);

    /**
     * @OA\Put(
     *   path="/api/tenant-modules/{tenant_module}",
     *   tags={"Asignacion Modulos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar una asignacion de modulo",
     *   description="Actulizar una asignacion de modulo específico por Id",
     *   operationId="editTenantModule",
     *   @OA\Parameter(
     *     name="tenant_module",
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
     *           property="status_id",
     *           description="Id del estado del modulo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "status_id": "required|integer|exists:landlord.status,id",
     *      },
     *   )),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(TenantModuleRequest $request, TenantModules $tenant_module);

    /**
     * @OA\Delete(
     *   path="/api/tenant-modules/{tenant_module}",
     *   tags={"Asignacion Modulos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un modulo de inquilino",
     *   description="Eliminar un modulo de un inquilino específico por Id",
     *   operationId="deleteTenantModule",
     *   @OA\Parameter(
     *     name="tenant_module",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
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
    public function destroy(TenantModules $tenant_module);

    /**
     * @OA\Put(
     *   path="/api/tenant-modules/{id}",
     *   tags={"Asignacion Modulos (Endpoints del dueño de la aplicación)"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Activar una asignacion de modulos",
     *   description="Activa la información de asignacion de modulo específica por Id.",
     *   operationId="enableTenantModule",
     *   @OA\Parameter(
     *     name="id",
     *     description="Id del modulo asignado",
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
    public function EnableTenantModule($id);
}
