<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\ClassroomTypeRequest;
use App\Models\ClassroomType;
use Illuminate\Http\Request;

interface IClassroomTypeController
{
    /**
     * @OA\Get(
     *   path="/api/classroom-types",
     *   tags={"Tipo de Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de aulas",
     *   description="Muestra todos los tipos de aulas en formato JSON",
     *   operationId="getAllClassroomTypes",
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
     *   path="/api/classroom-types",
     *   tags={"Tipo de Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear tipo de aula",
     *   description="Crear un nuevo tipo de aula.",
     *   operationId="addClassRoomType",
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
     *           property="clt_name",
     *           description="Nombre del tipo de aula",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="clt_description",
     *           description="Descripcion del tipo de aula",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de  aula",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "clt_name" : "requierd|string",
     *           "status_id" : "integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */

    public function store(ClassroomTypeRequest $request);

    /**
     * @OA\Get(
     *   path="/api/classroom-types/{id}",
     *   tags={"Tipo de Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo de aula",
     *   description="Muestra información específica de un tipo de aula por Id.",
     *   operationId="getClassroomType",
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
     *     description="Id del tipo de aula",
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
     *   path="/api/classroom-types/{classroomType}",
     *   tags={"Tipo de Aulas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar aula",
     *   description="Actualizar una aula.",
     *   operationId="updateClassroomTypes",
     *   @OA\Parameter(
     *     name="classroomType",
     *     description="Id del tipo del aula",
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
     *           property="clt_name",
     *           description="Nombre del tipo de aula",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="clt_description",
     *           description="Descripcion del tipo de aula",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de  aula",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "clt_name" : "requierd|string",
     *           "status_id" : "integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(ClassroomTypeRequest $request, ClassroomType $classroomType);
}
