<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\ForgotPasswordRequest;

interface IForgorPasswordController
{
    /**
     * @OA\Post(
     *   path="/api/olvidar-clave",
     *   tags={"Restablecer Contraseña"},
     *   security={},
     *   summary="Enviar correo electrónico",
     *   description="Envia un correo para el restablecimiento de contraseña",
     *   operationId="sendResetLinkResponse",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *          @OA\Property(
     *           property="us_username",
     *           description="Nombre de usuario",
     *           type="string",
     *         ),
     *       )
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Se ha enviado un correo de cambio de contraseña"),
     *   @OA\Response(response=404, description="No se pudo enviar el correo electrónico a este nombre de usuario"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function sendResetLinkResponse (ForgotPasswordRequest $request);
}
