<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\ClassRoomFormRequest;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

interface IClassRoomController
{
    /**
     * @OA\Get(
     *   path="/api/classrooms",
     *   tags={"Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las aulas",
     *   description="Muestra todas las aulas en formato JSON",
     *   operationId="getAllClassrooms",
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
     *   path="/api/classrooms",
     *   tags={"Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear aula",
     *   description="Crear una nueva aula.",
     *   operationId="addClassRoom",
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
     *           property="cl_name",
     *           description="Nombre del aula",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cl_description",
     *           description="Descripcion del aula",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del aula",
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

    public function store(ClassRoomFormRequest $request);

    /**
     * @OA\Get(
     *   path="/api/classrooms/{id}",
     *   tags={"Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un aula",
     *   description="Muestra información específica de un aula por Id.",
     *   operationId="getClassroom",
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
     *     description="Id del aula",
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
     *   path="/api/classrooms/{classroom}",
     *   tags={"Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar aula",
     *   description="Actualizar una aula.",
     *   operationId="updateClassrooms",
     *   @OA\Parameter(
     *     name="classroom",
     *     description="Id del aula",
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
     *           property="cl_name",
     *           description="Nombre del aula",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="cl_description",
     *           description="Descripcion del aula",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del aula",
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
    public function update(Request $request, ClassRoom $classroom);

    /**
     * @OA\Delete(
     *   path="/api/classrooms/{classroom}",
     *   tags={"Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un aula",
     *   description="Eliminar un aula por Id",
     *   operationId="deleteClassrooms",
     *   @OA\Parameter(
     *     name="classroom",
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
    public function destroy(ClassRoom $classroom);
}
