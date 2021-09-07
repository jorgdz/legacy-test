<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Pensum;
use Illuminate\Http\Request;
use App\Http\Requests\StorePensumRequest;
use App\Http\Requests\UpdatePensumRequest;

interface IPensumController {

    /**
     * @OA\Get(
     *   path="/api/pensums",
     *   tags={"Pensums"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los pensums",
     *   description="Muestra todos los pensums en formato JSON",
     *   operationId="getAllPensums",
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
     *   path="/api/pensums",
     *   tags={"Pensums"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un pensum",
     *   description="Crear un nuevo pensum.",
     *   operationId="addPensum",
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
     *           property="pen_name",
     *           description="Nombre del pensum",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pen_acronym",
     *           description="Siglas del pensum",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pen_description",
     *           description="Descripción del pensum",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="anio",
     *           description="Año del pensum",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del pensum",
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
    public function store(StorePensumRequest $request);

    /**
     * @OA\Get(
     *   path="/api/pensums/{id}",
     *   tags={"Pensums"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un pensum",
     *   description="Muestra información específica de un pensum por Id.",
     *   operationId="getPensums",
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
     *     description="Id del pensum",
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
     *   path="/api/pensums/{pensum}",
     *   tags={"Pensums"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar pensum",
     *   description="Actualizar un pensum.",
     *   operationId="updatePensums",
     *   @OA\Parameter(
     *     name="pensum",
     *     description="Id del pensum",
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
     *           property="pen_name",
     *           description="Nombre del pensum",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pen_acronym",
     *           description="Siglas del pensum",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pen_description",
     *           description="Descripción del pensum",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="anio",
     *           description="Año del pensum",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del pensum",
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
    public function update(UpdatePensumRequest $request, Pensum $pensum);

    /**
     * @OA\Delete(
     *   path="/api/pensums/{pensum}",
     *   tags={"Pensums"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un pensum",
     *   description="Eliminar una pensum por Id",
     *   operationId="deletePensums",
     *   @OA\Parameter(
     *     name="pensum",
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
    public function destroy(Pensum $pensum);
}
