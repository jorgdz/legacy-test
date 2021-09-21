<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Mesh;
use Illuminate\Http\Request;
use App\Http\Requests\MeshRequest;
use App\Http\Requests\ShowByUserProfileIdRequest;

interface IMeshsController
{

    /**
     * @OA\Get(
     *   path="/api/meshs",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las mallas",
     *   description="Muestra todas las mallas en formato JSON",
     *   operationId="getAllMeshs",
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
     * @OA\Post(
     *   path="/api/meshs",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear mallas",
     *   description="Crear una nueva malla.",
     *   operationId="addMesh",
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
     *           property="mes_name",
     *           description="Nombre de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_description",
     *           description="Descripcion de malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_acronym",
     *           description="Acronimo(Siglas) de malla",
     *           type="string"
     *         ),
     *         @OA\Property(
     *           property="pensum_id",
     *           description="Id del pensum",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="level_edu_id",
     *           description="Id de nivel de educación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la malla",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "mes_name" : "required|max:255|unique:meshs,mes_name",
     *          "mes_acronym" : "required|max:3",
     *          "pensum_id" : "required|integer|exists:pensums,id",
     *          "level_edu_id" : "required|integer|exists:education_levels,id",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(MeshRequest $request);



    /**
     * @OA\Get(
     *   path="/api/meshs/{id}",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una malla",
     *   description="Muestra información específica de una malla.",
     *   operationId="getMesh",
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
     *     description="Id de la malla",
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
    public function show(ShowByUserProfileIdRequest $request, $id);


    /**
     * @OA\Put(
     *   path="/api/meshs/{meshs}",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar malla",
     *   description="Actualizar una malla.",
     *   operationId="updateMesh",
     *   @OA\Parameter(
     *     name="meshs",
     *     description="Id de la malla",
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
     *        @OA\Property(
     *           property="mes_name",
     *           description="Nombre de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_description",
     *           description="Descripcion de malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_acronym",
     *           description="Acronimo(Siglas) de malla",
     *           type="string"
     *         ),
     *         @OA\Property(
     *           property="pensum_id",
     *           description="Id del pensum",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="level_edu_id",
     *           description="Id del nivel de educación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la malla",
     *           type="integer",
     *         )
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "mes_name" : "required|max:255|unique:meshs,mes_name",
     *          "mes_acronym" : "required|max:3",
     *          "pensum_id" : "required|integer|exists:pensums,id",
     *          "level_edu_id" : "required|integer|exists:education_levels,id",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(MeshRequest $request, Mesh $mesh);


    /**
     * @OA\Delete(
     *   path="/api/meshs/{mesh}",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una malla",
     *   description="Eliminar una malla por Id",
     *   operationId="deleteMesh",
     *   @OA\Parameter(
     *     name="mesh",
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
    public function destroy(Mesh $mesh);
}
