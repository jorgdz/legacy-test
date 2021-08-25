<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfileRequest;

interface IProfileController
{
    /**
     * @OA\Get(
     *   path="/api/profiles",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los perfiles",
     *   description="Muestra todos los perfiles paginados en formato JSON",
     *   operationId="getAllProfiles",
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
     *     description="Ordenar por columna",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="id"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="type_sort",
     *     description="Sentido del Orden",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="desc"
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
     *   path="/api/profiles/{profile}",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Guarda un perfil",
     *   description="Guarda la eliminación de un perfil.",
     *   operationId="saveProfile",
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
    public function store(StoreProfileRequest $request);

    /**
     * @OA\Get(
     *   path="/api/profiles/{profile}",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un perfil",
     *   description="Muestra información específica de un perfil.",
     *   operationId="showProfile",
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
    public function show(Profile $profile);

    /**
     * @OA\Get(
     *   path="/api/profiles/{profile}",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Editar perfil",
     *   description="Edita la información de un perfil usando el ID.",
     *   operationId="editProfile",
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
    public function update(StoreProfileRequest $request, Profile $profile);

    /**
     * @OA\Get(
     *   path="/api/profiles/{profile}",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Elimina un perfil",
     *   description="Actualiza la fecha de eliminación de un perfil.",
     *   operationId="removeProfile",
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
    public function destroy(Profile $profile);
}
