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
     *   description="Crear un nuevo nuevo inquilino y lanzar sus migraciones.",
     *   operationId="addTenant",
     *     @OA\RequestBody(
     *       required=true,
     *       description="Nuevo inquilino",
     *       @OA\JsonContent(
     *              @OA\Property(property="name", type="string"),
     *              @OA\Property(property="domain", type="string"),
     *       )
     *     ),
     *   @OA\Response(response=201, description="Creado con exito", @OA\JsonContent()),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(Request $request);

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CustomTenant $tenant);

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenant);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomTenant $tenant);
}
