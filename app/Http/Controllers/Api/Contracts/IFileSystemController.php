<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;

interface IFileSystemController
{
    /**
     * @OA\Get(
     *   path="/api/show",
     *   tags={"Archivos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una archivo",
     *   description="Muestra la información de un archivo por su nombre.",
     *   operationId="getFileStorage",
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
     *     name="name",
     *     description="nombre del archivo",
     *     in="query",
     *     required=true,
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
    public function showFile(Request $request);

    /**
     * @OA\Get(
     *   path="/api/download",
     *   tags={"Archivos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una archivo",
     *   description="Descarga el archivo por su nombre.",
     *   operationId="donwloadFileStorage",
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
     *     name="name",
     *     description="nombre del archivo",
     *     in="query",
     *     required=true,
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
    public function downloadFile(Request $request);
}