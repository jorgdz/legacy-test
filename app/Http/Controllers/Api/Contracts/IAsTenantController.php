<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;

interface IAsTenantController
{
    /**
     * @OA\Get(
     *   path="/api/as-tenant",
     *   tags={"Inquilino actual"},
     *   security={},
     *   summary="Inquilino actual",
     *   description="Mostrar el inquilino actual",
     *   operationId="getCurrentTenant",
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function asTenant (Request $request);
}
