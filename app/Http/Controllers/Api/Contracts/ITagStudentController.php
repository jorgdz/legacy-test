<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\TagStudent;
use Illuminate\Http\Request;
use App\Http\Requests\TagStudentFormRequest;

interface ITagStudentController
{
     /**
     * @OA\Get(
     *   path="/api/tags-student",
     *   tags={"Etiquetas de Estudiante"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las etiquetas de un estudiante",
     *   description="Muestra todos las etiquetas del estudiente en formato JSON",
     *   operationId="getAllTagsStudent",
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
     *   path="/api/tags-student",
     *   tags={"Etiquetas de Estudiante"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una etiqueta de estudiante",
     *   description="Crear una nueva etiqueta de estudiante.",
     *   operationId="addTagStudent",
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
     *           property="tg_name",
     *           description="Nombre de la etiqueta",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tg_description",
     *           description="Descripcion de la etiqueta",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="ID de status",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "tg_name": "required|string",
     *          "status_id": "required|integer|exists",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(TagStudentFormRequest $request);
    
    /**
     * @OA\Get(
     *   path="/api/tags-student/{id}",
     *   tags={"Etiquetas de Estudiante"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener etiqueta de estudiante",
     *   description="Muestra información específica de una etiqueta de estudiante por Id.",
     *   operationId="getTagStudent",
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
     *     description="Id de etiqueta de estudiante",
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
     *   path="/api/tags-student/{tagstudent}",
     *   tags={"Etiquetas de Estudiante"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar etiqueta de estudiante",
     *   description="Actualizar una etiqueta de estudiante.",
     *   operationId="updateTagStudent",
     *   @OA\Parameter(
     *     name="tagstudent",
     *     description="Id de etiqueta de estudiante",
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
     *           property="tg_name",
     *           description="Nombre de la etiqueta",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="tg_description",
     *           description="Descripcion de la etiqueta",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="ID de status",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "tg_name": "required|string",
     *          "status_id": "required|integer|exists",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(Request $request, TagStudent $tagstudent);
    
    /**
     * @OA\Delete(
     *   path="/api/tags-student/{tagstudent}",
     *    tags={"Etiquetas de Estudiante"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar etiqueta de estudiante",
     *   description="Eliminar etiqueta de estudiante por Id",
     *   operationId="deleteTagStudent",
     *   @OA\Parameter(
     *     name="tagStudent",
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
    public function destroy(TagStudent $tagstudent);
    
}