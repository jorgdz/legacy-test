<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Models\InstitutionSubject;
use App\Http\Requests\InstitutionSubjectRequest;

interface IInstitutionSubjectController
{
    /**
     * @OA\Get(
     *   path="/api/institution-subjects",
     *   tags={"Materias de Instituciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las materias de instituciones",
     *   description="Muestra todas las materias de instituciones en formato JSON",
     *   operationId="getAllInstitutionSubjects",
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
     *   path="/api/institution-subjects",
     *   tags={"Materias de Instituciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una materia para institucion",
     *   description="Crear una nueva materia para institucion.",
     *   operationId="addInstitutionSubject",
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
     *           property="name",
     *           description="Nombre de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="Descripcion de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="institute_id",
     *           description="ID del instituto",
     *           type="integer",
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
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "name": "nullable|string",
     *          "description": "nullable|string",
     *          "institute_id": "required|integer|exists:tenant.institutes,id",
     *          "status_id": "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */

    public function store(InstitutionSubjectRequest $request);

    /**
     * @OA\Get(
     *   path="/api/institution-subjects/{id}",
     *   tags={"Materias de Instituciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una materia de institucion",
     *   description="Muestra información específica de una materia de institucion por Id.",
     *   operationId="getInstitutionSubject",
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
     *     description="Id de la materia por institucion",
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
     *   path="/api/institution-subjects/{institutionSubject}",
     *   tags={"Materias de Instituciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar materia por institucion",
     *   description="Actualizar una materia por institucion.",
     *   operationId="updateInstitutionSubject",
     *   @OA\Parameter(
     *     name="institutionSubject",
     *     description="Id de la materia por institucion",
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
     *           property="name",
     *           description="Nombre de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="Descripcion de la materia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="institute_id",
     *           description="ID del instituto",
     *           type="integer",
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
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "name": "nullable|string",
     *          "description": "nullable|string",
     *          "institute_id": "required|integer|exists:tenant.institutes,id",
     *          "status_id": "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(InstitutionSubjectRequest $request, InstitutionSubject $institutionSubject);

    /**
     * @OA\Delete(
     *   path="/api/institution-subjects/{institutionSubject}",
     *   tags={"Materias de Instituciones"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una materia por institucion",
     *   description="Eliminar una materia por institucion por Id",
     *   operationId="deleteParallels",
     *   @OA\Parameter(
     *     name="institutionSubject",
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
    public function destroy(InstitutionSubject $institutionSubject);
}
