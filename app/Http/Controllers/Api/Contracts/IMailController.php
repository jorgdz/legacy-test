<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Mail;
use Illuminate\Http\Request;

interface IMailController
{
    /**
     * @OA\Get(
     *   path="/api/mails",
     *   tags={"Mails"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los mails",
     *   description="Muestra todas los mails en formato JSON",
     *   operationId="getAllMails",
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
     * @OA\Get(
     *   path="/api/mails/{id}",
     *   tags={"Mails"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un mail",
     *   description="Muestra información específica de un mail por Id.",
     *   operationId="getMails",
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
     *     description="Id del mail",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
     *   path="/api/mails/{mail}",
     *   tags={"Mails"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar mail",
     *   description="Actualizar un mail.",
     *   operationId="updateMails",
     *   @OA\Parameter(
     *     name="mail",
     *     description="Id del mail",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
     *           property="transport",
     *           description="Nombre del transport",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="host",
     *           description="Nombre del host",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="port",
     *           description="Numero del puerto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="encryption",
     *           description="Tipo del encryption",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="username",
     *           description="Nombre de usuario",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="password",
     *           description="Contraseña",
     *           type="string",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(Request $request, Mail $mail);
}
