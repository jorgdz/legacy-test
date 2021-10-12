<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\UserLoginGmailFormRequest;

interface IAuthController
{
    /**
     * @OA\Post(
     *   path="/api/login",
     *   tags={"Autenticación"},
     *   security={},
     *   summary="Iniciar sesion",
     *   description="Crear token para usuario autenticado",
     *   operationId="addSessionUser",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="us_username",
     *           description="Nombre de usuario",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="password",
     *           description="Contrasena del usuario",
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
    public function login(UserFormRequest $request);

    /**
     * @OA\Get(
     *   path="/api/whoami",
     *   tags={"Autenticado"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener el usuario autenticado",
     *   description="Muestra información de un usuario autenticado.",
     *   operationId="getUserAuth",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function whoami(Request $request);

    /**
     * @OA\Post(
     *   path="/api/logout",
     *   tags={"Autenticado"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Remover token del usuario autenticado",
     *   description="Remover token",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function logout(Request $request);

    /**
     * @OA\Post(
     *   path="/api/logout/all-devices",
     *   tags={"Autenticado"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Remover los tokens del usuario autenticado",
     *   description="Remover token",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function logout_all_devices(Request $request);


    /**
     * @OA\Post(
     *   path="/api/login-gmail",
     *   tags={"Autenticación Gmail"},
     *   security={},
     *   summary="Iniciar sesion con gmail",
     *   description="Crear token para usuario autenticado",
     *   operationId="addSessionUserGmail",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="email",
     *           description="correo",
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
    public function loginGmail(UserLoginGmailFormRequest $request);
}
