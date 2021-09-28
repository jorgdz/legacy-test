<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Relative;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\RelativeFormRequest;
use App\Http\Requests\PersonRequest;

interface IRelativeController
{
    /**
     * @OA\Get(
     *   path="/api/relatives",
     *   tags={"Familiares"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar familiares",
     *   description="Muestra todas los familiares en formato JSON",
     *   operationId="getAllRelatives",
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
     *   path="/api/relatives",
     *   tags={"Familiares"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear familiar",
     *   description="Crear un nuevo familiar.",
     *   operationId="addRelative",
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
     *           property="person_id_relative",
     *           description="Id de persona (familiar)",
     *           type="integer",
     *         ),
     *        @OA\Property(
     *           property="person_id_student",
     *           description="Id de persona (estudiante)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_kinship_id",
     *           description="Id del parentesco",
     *           type="integer",
     *           example="74 - 80",
     *         ),
     *         @OA\Property(
     *           property="rel_description",
     *           description="Descripcion del parentesco",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del familiar",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "person_id_relative" : "required|integer|exists:tenant.persons,id",
     *          "person_id_student"  : "required|integer|exists:tenant.persons,id",
     *          "type_kinship_id"    : "required|integer|exists:tenant.catalogs,id",
     *          "status_id"          : "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(RelativeFormRequest $request);

     /**
     * @OA\Get(
     *   path="/api/relatives/{id}",
     *   tags={"Familiares"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un familiar",
     *   description="Muestra información específica de un familiar por Id.",
     *   operationId="getRelative",
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
     *     description="Id del familiar",
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
     *   path="/api/relatives/{relative}",
     *   tags={"Familiares"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar familiar",
     *   description="Actualizar un familiar.",
     *   operationId="updateRelatives",
     *   @OA\Parameter(
     *     name="relative",
     *     description="Id del familiar",
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
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="person_id_relative",
     *           description="Id de persona (familiar)",
     *           type="integer",
     *         ),
     *        @OA\Property(
     *           property="person_id_student",
     *           description="Id de persona (estudiante)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_kinship_id",
     *           description="Id del parentesco",
     *           type="integer",
     *           example="74 - 80",
     *         ),
     *         @OA\Property(
     *           property="rel_description",
     *           description="Descripcion del parentesco",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del familiar",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "person_id_relative" : "required|integer|exists:tenant.persons,id",
     *          "person_id_student"  : "required|integer|exists:tenant.persons,id",
     *          "type_kinship_id"    : "required|integer|exists:tenant.catalogs,id",
     *          "status_id"          : "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(Request $request, Relative $relative);

    /**
     * @OA\Delete(
     *   path="/api/relatives/{relative}",
     *   tags={"Familiares"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un familiar",
     *   description="Eliminar una familiar por Id",
     *   operationId="deleteRelative",
     *   @OA\Parameter(
     *     name="relative_id",
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
    public function destroy (Relative $relative);

}
