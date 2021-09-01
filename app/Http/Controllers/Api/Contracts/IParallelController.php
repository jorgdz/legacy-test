<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\ParallelFormRequest;
use App\Models\Parallel;
use Illuminate\Http\Request;

interface IParallelController
{

    /**
     * @OA\Get(
     *   path="/api/parallels",
     *   tags={"Paralelos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los paralelos",
     *   description="Muestra todos los paralelos en formato JSON",
     *   operationId="getAllParallels",
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
     *   path="/api/parallels",
     *   tags={"Paralelos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear paralelo",
     *   description="Crear un nuevo paralelo.",
     *   operationId="addParallel",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="par_name",
     *           description="Nombre del paralelo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="par_description",
     *           description="Descripcion del paralelo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del paralelo",
     *           type="integer",
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

    public function store(ParallelFormRequest $request);

    /**
     * @OA\Get(
     *   path="/api/parallels/{id}",
     *   tags={"Paralelos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un paralelo",
     *   description="Muestra información específica de un paralelo por Id.",
     *   operationId="getParallels",
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
     *     description="Id del paralelo",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
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
     *   path="/api/parallels/{parallel}",
     *   tags={"Paralelos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar paralelo",
     *   description="Actualizar un permiso.",
     *   operationId="updateParallels",
     *   @OA\Parameter(
     *     name="parallel",
     *     description="Id del paralelo",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
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
     *           property="par_name",
     *           description="Nombre del paralelo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="par_description",
     *           description="Descripcion del permiso",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del paralelo",
     *           type="integer",
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
    public function update(ParallelFormRequest $request, Parallel $parallel);

    /**
     * @OA\Delete(
     *   path="/api/parallels/{parallel}",
     *   tags={"Paralelos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un paralelo",
     *   description="Eliminar un paralelo por Id",
     *   operationId="deleteParallels",
     *   @OA\Parameter(
     *     name="parallel",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
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
    public function destroy(Parallel $permission);

}
