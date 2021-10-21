<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\EducationLevelFormRequest;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use App\Http\Requests\MeshRequest;
use App\Http\Requests\ShowByUserProfileIdRequest;

interface IEducationLevelController
{

    /**
     * @OA\Get(
     *   path="/api/education-levels",
     *   tags={"Niveles Educativos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las niveles Educativos",
     *   description="Muestra todas los niveles educativos en formato JSON",
     *   operationId="getAllEducationLevels",
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
     *     name="principal_id",
     *     description="Principal",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example=""
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
     *   path="/api/education-levels",
     *   tags={"Niveles Educativos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear Nivel Educativo",
     *   description="Crear nuevo Nivel Educativo.",
     *   operationId="addEducationLevels",
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
     *           property="edu_name",
     *           description="Nombre del Nivel Educativo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="edu_alias",
     *           description="Alias de Nivel Educativo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="principal_id",
     *           description="Id principal",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="offer_id",
     *           description="Oferta asociada al nivel educativo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del nivel educativo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "edu_name" : "required|max:255",
     *          "edu_alias" : "required|max:255",
     *          "edu_order" : "required|integer",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(EducationLevelFormRequest $educationLevelFormRequest);

    /**
     * @OA\Get(
     *   path="/api/education-levels/{id}",
     *   tags={"Niveles Educativos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una malla",
     *   description="Muestra información específica de un nivel educativo.",
     *   operationId="getEducationLevel",
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
     *     description="Id de nivel educativo",
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
     * @OA\Get(
     *   path="/api/education-levels/parents",
     *   tags={"Niveles Educativos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener niveles educativos Padre con sus hijos",
     *   description="Muestra niveles educativos Exclusivamente padre (que contenga principal_id = null) con sus hijos.",
     *   operationId="getEducationLevelParents",
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
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function getOnlyParents();

    /**
     * @OA\Put(
     *   path="/api/education-levels/{educationLevel}",
     *   tags={"Niveles Educativos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar Nivel Educativo",
     *   description="Actualizar un nivel educativo.",
     *   operationId="updateEducationLevels",
     *   @OA\Parameter(
     *     name="educationLevel",
     *     description="Id del nivel educativo",
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
     *           property="edu_name",
     *           description="Nombre del nivel educativo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="edu_alias",
     *           description="Alias del nivel educativo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="edu_order",
     *           description="Numero de Orden",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="principal_id",
     *           description="Codigo Principal",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="offer_id",
     *           description="Oferta asociada al nivel educativo",
     *           type="integer",
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
     *          "edu_name" : "required|max:255",
     *          "edu_alias" : "required|max:255",
     *          "edu_order" : "required|integer",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(EducationLevelFormRequest $request, EducationLevel $educationLevel);

    /**
     * @OA\Delete(
     *   path="/api/education-levels/{educationLevel}",
     *   tags={"Niveles Educativos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un nivel educativo",
     *   description="Eliminar un nivel educativo por Id",
     *   operationId="deleteEducationLevel",
     *   @OA\Parameter(
     *     name="educationLevel",
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
    public function destroy(EducationLevel $educationLevel);

        /**
     * @OA\Get(
     *   path="/api/education-levels/{educationlevel}/collaborators",
     *   tags={"Niveles Educativos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener colaboradores por nivel educativo",
     *   description="Obtener todos los colaboradores por nivel educativo",
     *   operationId="getCollaboratorPerEducationLvl",
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
     *     name="educationlevel",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="type_collaborator",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="string",
     *       example="D"
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
     *     name="data",
     *     description="mostrar todos los datos sin paginacion (enviar all)",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
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
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function getCollaboratorsPerEducationLvl (EducationLevel $educationlevel, Request $request);
}
