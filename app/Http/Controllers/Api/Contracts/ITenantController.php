<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\CustomTenant;
use Illuminate\Http\Request;

interface ITenantController
{

    /**
     * @OA\Get(
     *   path="/api/tenants",
     *   tags={"Inquilinos"},
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
     *   tags={"Inquilinos"},
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
     *           property="database",
     *           description="Base de datos del inquilino",
     *           type="string",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
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
     *   tags={"Inquilinos"},
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
     *   tags={"Inquilinos"},
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
    public function update(Request $request, $tenant);

    /**
     * @OA\Delete(
     *   path="/api/tenants/{tenant}",
     *   tags={"Inquilinos"},
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
}
