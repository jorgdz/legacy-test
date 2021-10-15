<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Area;
use App\Models\AreaGroup;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\AreaGroupRequest;

interface IAreaGroupController
{
    /**
     * @OA\Get(
     *   path="/api/group-areas",
     *   tags={"Grupo Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los grupos de areas",
     *   description="Muestra todos los grupos areas en formato JSON",
     *   operationId="getAllGroupAreas",
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
     *     name="data",
     *     description="Mostrar todos los datos sin paginacion (enviar all)",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="search",
     *     description="Filtrar registros por el campo sigla (solamente usar cuando se envia data/all)",
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
     *   path="/api/group-areas",
     *   tags={"Grupo Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un grupo area",
     *   description="Crear un nuevo grupo area.",
     *   operationId="addGroupArea",
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
     *           property="arg_name",
     *           description="Nombre del grupo area",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="arg_description",
     *           description="Descripcion del grupo area",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="arg_keywords",
     *           description="Keyword del grupo área",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *      @OA\JsonContent(
     *          example={
     *              "arg_name": "required|string|unique:tenant.group_areas,arg_name",
     *              "arg_description": "nullable|string",
     *              "arg_keywords": "required|string|unique:tenant.group_areas,arg_keywords",
     *              "status_id": "required|integer|exists:tenant.status,id",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(AreaGroupRequest $request);

    /**
     * @OA\Get(
     *   path="/api/group-areas/{id}",
     *   tags={"Grupo Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una area",
     *   description="Muestra información específica de una area por Id.",
     *   operationId="getGroupArea",
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
     *     description="Id del grupo area",
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
     *   path="/api/group-areas/{areaGroup}",
     *   tags={"Grupo Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar grupo area",
     *   description="Actualizar un grupo area.",
     *   operationId="updateGroupArea",
     *   @OA\Parameter(
     *     name="areaGroup",
     *     description="Id del grupo area",
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
     *           property="arg_name",
     *           description="Nombre del grupo area",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="arg_description",
     *           description="Descripcion del grupo area",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="arg_keywords",
     *           description="Keyword del grupo área",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del catalogo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *      @OA\JsonContent(
     *          example={
     *              "arg_name": "required|string|unique:tenant.group_areas,arg_name",
     *              "arg_description": "nullable|string",
     *              "arg_keywords": "required|string|unique:tenant.group_areas,arg_keywords",
     *              "status_id": "required|integer|exists:tenant.status,id",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(AreaGroupRequest $request, AreaGroup $areaGroup);

    /**
     * @OA\Delete(
     *   path="/api/group-areas/{areaGroup}",
     *   tags={"Grupo Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un grupo area",
     *   description="Eliminar un grupo area por Id",
     *   operationId="deleteGroupArea",
     *   @OA\Parameter(
     *     name="areaGroup",
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
    public function destroy(AreaGroup $areaGroup);

    /**
     * @OA\Post(
     *   path="/api/group-areas/{ïd}/education-level-subjects",
     *   tags={"Grupo Areas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar materias de nivelacion a una carrera en un grupo",
     *   description="Asignar materias de nivelacion a una carrera en un grupo",
     *   operationId="addMateriasNivEducationLevelGroupArea",
     *   @OA\Parameter(
     *     name="ïd",
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
     *           property="education_levels",
     *           type="array",
     *           @OA\Items(
     *             type="integer",
     *             example="1,2"
     *           ),
     *           description="Asignar niveles educativos (carreras)",
     *         ),
     *         @OA\Property(
     *           property="subjects",
     *           type="array",
     *           @OA\Items(
     *             type="integer",
     *             example="1,2"
     *           ),
     *           description="Asignar materias",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *      @OA\JsonContent(
     *          example={
     *              "subjects": "required",
     *              "education_levels": "required",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function assignEducationLevelSubjects (Request $request, $id);
}
