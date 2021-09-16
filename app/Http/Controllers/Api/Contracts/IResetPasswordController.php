<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;

interface IResetPasswordController
{

    /**
     * @OA\Get(
     *   path="/api/restablecer-clave/{token}",
     *   tags={"Restablecer Contraseña"},
     *   security={},
     *   summary="Verificar token",
     *   description="Verifica el token enviado por correo y obtiene los datos en formato JSON",
     *   operationId="verifyToken",
     *   @OA\Parameter(
     *     name="email",
     *     description="Correo electrónico del usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="string",
     *       example="myemail@email.com"
     *     ),
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="token",
     *           description="Token enviado al correo",
     *           type="string",
     *         ),
     *       )
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function verifyToken(Request $request, string $token);


    /**
     * @OA\Post(
     *   path="/api/restablecer-clave",
     *   tags={"Restablecer Contraseña"},
     *   security={},
     *   summary="Restablecer nueva contraseña",
     *   description="Recibe los datos para el restablecimiento de contraseña",
     *   operationId="sendResetResponse",
     *   @OA\Parameter(
     *     name="email",
     *     description="Correo electrónico del usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="string",
     *       example="myemail@email.com"
     *     ),
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="token",
     *           description="Token",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="password",
     *           description="Nueva contraseña",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="password_confirmation",
     *           description="Repetir la nueva contraseña",
     *           type="string",
     *         ),
     *       )
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Se ha cambiado la contraseña"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *        "token" : "required",
     *       "email" : "required|email",
     *       "password" : "required|confirmed",
     *       "password_confirmation" : "required|same:password"
     *      },
     *   )),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function sendResetResponse (ResetPasswordRequest $request);
}
