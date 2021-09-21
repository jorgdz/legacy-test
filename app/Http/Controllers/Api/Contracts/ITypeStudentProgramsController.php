<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests\ShowByUserProfileIdRequest;
use App\Http\Requests\TypeStudentProgramFormRequest;
use App\Models\TypeStudentProgram;

interface ITypeStudentProgramsController
{

    /**
     * @OA\Get(
     *   path="/api/type-student-program",
     *   tags={"Tipo programa para estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de programas para estudiantes",
     *   description="Muestra todas los tipos de programas para estudiantes en formato JSON",
     *   operationId="getAllTypeStudentProgram",
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
     *  @OA\Parameter(
     *     name="data",
     *     description="mostrar todos los datos sin paginacion (enviar all)",
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
     *   path="/api/type-student-program",
     *   tags={"Tipo programa para estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear tipo programa para estudiantes",
     *   description="Crear nuevo tipo programa para estudiantes.",
     *   operationId="addTypeStudentPrograms",
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
     *           property="typ_stu_pro_name",
     *           description="Nombre del tipo programa para estudiantes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_stu_pro_description",
     *           description="Descripcion de tipo programa para estudiantes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_stu_pro_acronym",
     *           description="Acrónimo de tipo programa para estudiantes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de tipo programa para estudiantes",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "typ_stu_pro_name": "required|max:255|unique",
     *           "typ_stu_pro_acronym": "required|max:10|unique",
     *           "status_id": "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(TypeStudentProgramFormRequest $typeStudentProgramFormRequest);


    /**
     * @OA\Get(
     *   path="/api/type-student-program/{id}",
     *   tags={"Tipo programa para estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo de programas para estudiantes",
     *   description="Muestra información específica de un tipo de programas para estudiantes.",
     *   operationId="getIdTypeStudentPrograms",
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
     *     description="Id del tipo programa para estudiante",
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
     *   path="/api/type-student-program/{typeStudentProgram}",
     *   tags={"Tipo programa para estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar tipo documento",
     *   description="Actualizar un tipo de programas para estudiante.",
     *   operationId="updateTypeStudentPrograms",
     *   @OA\Parameter(
     *     name="typeStudentProgram",
     *     description="Id del tipo de programas para estudiante",
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
     *           property="typ_stu_pro_name",
     *           description="Nombre del tipo programa para estudiantes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_stu_pro_description",
     *           description="Descripcion de tipo programa para estudiantes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_stu_pro_acronym",
     *           description="Acrónimo de tipo programa para estudiantes",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de calificación",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *             "typ_stu_pro_name": "required|max:255|unique",
     *           "typ_stu_pro_acronym": "required|max:10|unique",
     *           "status_id": "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(TypeStudentProgramFormRequest $request, TypeStudentProgram $typeStudentProgram);

    /**
     * @OA\Delete(
     *   path="/api/type-student-program/{typeStudentProgram}",
     *   tags={"Tipo programa para estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un tipo programa para estudiantes",
     *   description="Eliminar un tipo programa para estudiantes por Id",
     *   operationId="deleteTypeStudentPrograms",
     *   @OA\Parameter(
     *     name="typeStudentProgram",
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
    public function destroy(TypeStudentProgram $typeStudentProgram);
}
