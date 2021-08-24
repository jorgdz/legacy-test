<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

interface IUserController
{
    /**
     * @OA\Get(
     *   path="/api/users",
     *   tags={"Usuarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los usuarios",
     *   description="Muestra todos los usuarios paginados en formato JSON",
     *   operationId="getAllUsers",
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
    public function index (Request $request);

    /**
     * @OA\Get(
     *   path="/api/users/{user}",
     *   tags={"Usuarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un usuario",
     *   description="Muestra información específica de un usuario.",
     *   operationId="getUser",
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
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
    public function show (User $user);

    /**
     * store
     *
     * Create a new user
     * @param  mixed $request
     * @return void
     */
    public function store (StoreUserRequest $request);

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update (Request $request, User $user);
}
