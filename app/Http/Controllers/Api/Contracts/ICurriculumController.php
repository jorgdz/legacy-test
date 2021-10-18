<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Curriculum;
use Illuminate\Http\Request;
use App\Http\Requests\CurriculumRequest;
use App\Http\Requests\ShowByUserProfileIdRequest;

interface ICurriculumController
{
    /**
     * @OA\Get(
     *   path="/api/curriculums",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las mallas",
     *   description="Muestra todas las mallas en formato JSON",
     *   operationId="getAllCurriculums",
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
     *   path="/api/curriculums",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear mallas",
     *   description="Crear una nueva malla.",
     *   operationId="addCurriculum",
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
     *           property="mes_name",
     *           description="Nombre de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_res_cas",
     *           description="Resolucion CAS",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_res_ocas",
     *           description="Resolucion OCAS",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_cod_career",
     *           description="Codigo de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_title",
     *           description="Titulo de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_itinerary",
     *           description="Itinerario de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_number_period",
     *           description="Numero de periodo de la malla",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_quantity_external_matter_homologate",
     *           description="Numero de materias externas a homologar",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_quantity_internal_matter_homologate",
     *           description="Numero de materias internas a homologar",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_creation_date",
     *           description="Fecha de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_acronym",
     *           description="Acronimo(Siglas) de malla",
     *           type="string"
     *         ),
     *         @OA\Property(
     *           property="anio",
     *           description="Año",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_description",
     *           description="Descripcion de malla",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="max_number_failed_subject",
     *           description="Número veces que puede repetir una materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_modality_id",
     *           description="Id de la modalidad de la malla (Catalogo)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_calification_id",
     *           description="Id del tipo de calificacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="level_edu_id",
     *           description="Id del nivel de educación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="components",
     *           description="Array de componentes",
     *           type="array",
     *          items={
     *             "type" : "object",
     *             "properties" : {
     *                  "component_id" : {
     *                      "type" : "integer",
     *                  },
     *              },
     *          },
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
     *          "mes_name": "required|max:255|unique:tenant.curriculums,mes_name",
     *          "mes_res_cas": "nullable|string|max:255",
     *          "mes_res_ocas": "nullable|string|max:255",
     *          "mes_cod_career": "nullable|string|max:255",
     *          "mes_title": "nullable|string|max:255",
     *          "mes_itinerary": "nullable|string|max:255",
     *          "mes_number_period": "nullable|integer",
     *          "mes_quantity_external_matter_homologate": "nullable|integer",
     *          "mes_quantity_internal_matter_homologate": "nullable|integer",
     *          "mes_creation_date": "nullable|date",
     *          "mes_acronym": "nullable|string|max:3",
     *          "components"        : "nullable|array",
     *          "components.*.component_id" : "integer|exists:tenant.components,id|distinct",
     *          "anio": "required|integer",
     *          "mes_description": "nullable|string",
     *          "mes_modality_id": "required|integer|exists:tenant.catalogs,id",
     *          "type_calification_id": "required|integer|exists:tenant.type_califications,id",
     *          "level_edu_id": "required|integer|exists:tenant.education_levels,id",
     *          "status_id": "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(CurriculumRequest $request);

    /**
     * @OA\Get(
     *   path="/api/curriculums/{id}",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una malla",
     *   description="Muestra información específica de una malla.",
     *   operationId="getCurriculum",
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
     *   path="/api/curriculums/{curriculum}",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar malla",
     *   description="Actualizar una malla.",
     *   operationId="updateCurriculum",
     *   @OA\Parameter(
     *     name="curriculum",
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
     *         @OA\Property(
     *           property="mes_name",
     *           description="Nombre de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_res_cas",
     *           description="Resolucion CAS",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_res_ocas",
     *           description="Resolucion OCAS",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_cod_career",
     *           description="Codigo de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_title",
     *           description="Titulo de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_itinerary",
     *           description="Itinerario de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_number_period",
     *           description="Numero de periodo de la malla",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_quantity_external_matter_homologate",
     *           description="Numero de materias externas a homologar",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_quantity_internal_matter_homologate",
     *           description="Numero de materias internas a homologar",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_creation_date",
     *           description="Fecha de la malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="mes_acronym",
     *           description="Acronimo(Siglas) de malla",
     *           type="string"
     *         ),
     *         @OA\Property(
     *           property="anio",
     *           description="Año",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_description",
     *           description="Descripcion de malla",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="max_number_failed_subject",
     *           description="Número veces que puede repetir una materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mes_modality_id",
     *           description="Id de la modalidad de la malla (Catalogo)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_calification_id",
     *           description="Id del tipo de calificacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="level_edu_id",
     *           description="Id del nivel de educación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="components",
     *           description="Array de componentes",
     *           type="array",
     *          items={
     *             "type" : "object",
     *             "properties" : {
     *                  "component_id" : {
     *                      "type" : "integer",
     *                  },
     *              },
     *          },
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
     *          "mes_name": "required|max:255|unique:tenant.curriculums,mes_name",
     *          "mes_res_cas": "nullable|string|max:255",
     *          "mes_res_ocas": "nullable|string|max:255",
     *          "mes_cod_career": "nullable|string|max:255",
     *          "mes_title": "nullable|string|max:255",
     *          "mes_itinerary": "nullable|string|max:255",
     *          "mes_quantity_external_matter_homologate": "nullable|integer",
     *          "mes_quantity_internal_matter_homologate": "nullable|integer",
     *          "mes_number_period": "nullable|integer",
     *          "mes_creation_date": "nullable|date",
     *          "mes_acronym": "nullable|string|max:3",
     *          "components"        : "nullable|array",
     *          "components.*.component_id" : "integer|exists:tenant.components,id|distinct",
     *          "anio": "required|integer",
     *          "mes_description": "nullable|string",
     *          "mes_modality_id": "required|integer|exists:tenant.catalogs,id",
     *          "type_calification_id": "required|integer|exists:tenant.type_califications,id",
     *          "level_edu_id": "required|integer|exists:tenant.education_levels,id",
     *          "status_id": "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(CurriculumRequest $request, Curriculum $curriculum);

    /**
     * @OA\Delete(
     *   path="/api/curriculums/{curriculum}",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una malla",
     *   description="Eliminar una malla por Id",
     *   operationId="deleteCurriculum",
     *   @OA\Parameter(
     *     name="curriculum",
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
    public function destroy(Curriculum $curriculum);

    /**
     * @OA\Get(
     *   path="/api/curriculums/{curriculum}/subject",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener materias de una malla",
     *   description="Muestra las materias de una malla.",
     *   operationId="getMatterbyCurriculum",
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
     *     name="curriculum",
     *     description="Malla",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     * @OA\Parameter(
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
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function showMattersByMesh(Request $request, Curriculum $curriculum);

    /**
     * @OA\Get(
     *   path="/api/curriculums/{curriculum}/components",
     *   tags={"Mallas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener componentes de aprendizaje a partir de la malla",
     *   description="Muestra los componentes de aprendizaje asociados a una malla.",
     *   operationId="getComponentByCurriculum",
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
     *     name="curriculum",
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
    public function learningComponentByMesh(Curriculum $curriculum);
}
