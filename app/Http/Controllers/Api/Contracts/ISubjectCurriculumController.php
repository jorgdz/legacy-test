<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\SubjectCurriculumDependenciesRequest;
use App\Http\Requests\SubjectCurriculumRequest;
use App\Models\SubjectCurriculum;
use Illuminate\Http\Request;

interface ISubjectCurriculumController
{
    /**
     * @OA\Get(
     *   path="/api/subject-curriculum",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las materias y mallas",
     *   description="Muestra todos los registros paginados en formato JSON",
     *   operationId="getAllSubjectCurriculum",
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
     *     description="Ordenar por columna",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="id"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="type_sort",
     *     description="Sentido del Orden",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="desc"
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
    public function index (Request $request);

    /**
     * @OA\Post(
     *   path="/api/subject-curriculum",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar materia y malla",
     *   description="Crear un registro asociado de materia y malla.",
     *   operationId="addSubjectCurriculum",
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
     *           property="matter_id",
     *           description="Id de matter",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mesh_id",
     *           description="Id de mesh",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="simbology_id",
     *           description="Id de simbology",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="is_prerequisite",
     *           description="Es prerequisto",
     *           type="boolean",
     *           example="true",
     *         ),
     *         @OA\Property(
     *           property="min_note",
     *           description="Nota mínima",
     *           type="number",
     *         ),
     *         @OA\Property(
     *           property="min_calification",
     *           description="Calificacion minima del tipo de calificacion",
     *           type="number",
     *           format="float"
     *         ),
     *         @OA\Property(
     *           property="max_calification",
     *           description="Calificacion maxima del tipo de calificacion",
     *           type="number",
     *           format="float"
     *         ),
     *         @OA\Property(
     *           property="num_fouls",
     *           description="Numero de faltas",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="matter_rename",
     *           description="Materia renombre",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="group",
     *           description="Grupo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="calification_models_id",
     *           description="Id modelo calificación",
     *           type="integer",
     *         ),
     *          @OA\Property(
     *           property="can_external_homologations",
     *           description="homologante externo de materia malla",
     *           type="boolean",
     *           example="true",
     *         ),
     *          @OA\Property(
     *           property="can_internal_homologations",
     *           description="homologante interno de materia malla",
     *           type="boolean",
     *           example="true",
     *         ),
     *          @OA\Property(
     *           property="sub_cur_integrative_type",
     *           description="materia de tipo integradora de materia malla",
     *           type="boolean",
     *           example="true",
     *         ),
     *         @OA\Property(
     *           property="prerequisites",
     *           description="Prerequisitos de la materia malla",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1,2,3]",
     *           uniqueItems=true
     *         ),
     *         @OA\Property(
     *           property="components",
     *           description="Array de componentes",
     *           type="array",
     *          items={
     *             "type" : "object",
     *             "properties" : {
     *                  "components_id" : {
     *                      "type" : "integer",
     *                  },
     *                  "lea_workload" : {
     *                      "type" : "integer",
     *                  },
     *              },
     *          },
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
     *   @OA\JsonContent(
     *      example={
     *          "matter_id": "required|integer|exists:tenant.subjects,id",
     *          "mesh_id": "required|integer|exists:tenant.curriculums,id",
     *          "simbology_id": "integer|exists:tenant.simbologies,id",
     *          "min_note": "required|numeric",
     *          "min_calification": "'required|numeric",
     *          "max_calification": "'required|numeric",
     *          "num_fouls": "required|integer",
     *          "matter_rename": "nullable|string",
     *          "group": "nullable|integer",
     *          "can_external_homologations": "required|boolean",
     *          "can_internal_homologations": "required|boolean",
     *          "sub_cur_integrative_type": "required|boolean",
     *          "calification_models_id" : "required|integer|exists:tenant.calification_models,id",
     *          "prerequisites" :  "nullable|array",
     *          "prerequisites.*" :  "integer|exists:tenant.subject_curriculum,id|distinct",
     *          "components" :  "nullable|array",
     *          "components.*.component_id" :  "integer|exists:tenant.components,id|distinct",
     *          "components.*.lea_workload" :  "integer",
     *          "status_id": "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(SubjectCurriculumRequest $request);

    /**
     * @OA\Post(
     *   path="/api/subject-curriculum/{subjectcurriculum}/dependencies",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar dependencias a una materia y malla",
     *   description="Asigna materias que dependen de una materia y malla.",
     *   operationId="addSubjectCurriculumDependencies",
     *   @OA\Parameter(
     *     name="subjectcurriculum",
     *     description="Id del subjectcurriculum",
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
     *           type="integer"
     *         ),
     *          @OA\Property(
     *           property="matterMesh",
     *           description="Array de id de subjectcurriculum",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[7, 8]",
     *           uniqueItems=true
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Se ha asignado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "matterMesh" : "array",
     *          "matterMesh.*" : "integer|exists:tenant.matter_mesh,id|distinct",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function asignDependencies(SubjectCurriculumDependenciesRequest $request, SubjectCurriculum $subjectcurriculum);

    /**
     * @OA\Get(
     *   path="/api/subject-curriculum/{id}",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una materia y malla",
     *   description="Muestra información específica de una materia y malla por Id.",
     *   operationId="getSubjectCurriculum",
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
     *     description="Id de la materia y malla",
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
     *   path="/api/subject-curriculum/{subjectcurriculum}/dependencies",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener las materias que dependen de una materia por malla",
     *   description="Muestra información específica las materias que dependen de una materia por malla por Id.",
     *   operationId="getSubjectcurriculumDependencies",
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
     *     name="subjectcurriculum",
     *     description="Id de la materia y malla",
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
    public function showDependencies(SubjectCurriculum $subjectcurriculum);

    /**
     * @OA\Put(
     *   path="/api/subject-curriculum/{subjectcurriculum}",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar materias y mallas",
     *   description="Actualizar una materia y malla.",
     *   operationId="updatesubjectcurriculum",
     *   @OA\Parameter(
     *     name="subjectcurriculum",
     *     description="Id del subjectcurriculum",
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
     *           property="matter_id",
     *           description="Id de matter",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mesh_id",
     *           description="Id de mesh",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="simbology_id",
     *           description="Id de simbology",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="is_prerequisite",
     *           description="Es prerequisto",
     *           type="boolean",
     *           example="true",
     *         ),
     *         @OA\Property(
     *           property="min_note",
     *           description="Nota mínima",
     *           type="number",
     *         ),
     *         @OA\Property(
     *           property="min_calification",
     *           description="Calificacion minima del tipo de calificacion",
     *           type="number",
     *           format="float"
     *         ),
     *         @OA\Property(
     *           property="max_calification",
     *           description="Calificacion maxima del tipo de calificacion",
     *           type="number",
     *           format="float"
     *         ),
     *         @OA\Property(
     *           property="num_fouls",
     *           description="Numero de faltas",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="matter_rename",
     *           description="Materia renombre",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="group",
     *           description="Grupo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="calification_models_id",
     *           description="Id modelo calificación",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="can_external_homologations",
     *           description="homologante externo de materia malla",
     *           type="boolean",
     *           example="true",
     *         ),
     *          @OA\Property(
     *           property="can_internal_homologations",
     *           description="homologante interno de materia malla",
     *           type="boolean",
     *           example="true",
     *         ),
     *          @OA\Property(
     *           property="sub_cur_integrative_type",
     *           description="materia de tipo integradora de materia malla",
     *           type="boolean",
     *           example="true",
     *         ),
     *         @OA\Property(
     *           property="prerequisites",
     *           description="Prerequisitos de la materia malla",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1,2,3]",
     *           uniqueItems=true
     *         ),
     *         @OA\Property(
     *           property="components",
     *           description="Array de componentes",
     *           type="array",
     *          items={
     *             "type" : "object",
     *             "properties" : {
     *                  "components_id" : {
     *                      "type" : "integer",
     *                  },
     *                  "lea_workload" : {
     *                      "type" : "integer",
     *                  },
     *              },
     *          },
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "matter_id": "required|integer|exists:tenant.subjects,id|unique:tenant.matter_mesh,matter_id,{$this->subjectcurriculum->id}",
     *          "mesh_id": "required|integer|exists:tenant.curriculums,id",
     *          "simbology_id": "integer|exists:tenant.simbologies,id",
     *          "min_note": "required|numeric",
     *          "min_calification": "'required|numeric",
     *          "max_calification": "'required|numeric",
     *          "num_fouls": "required|integer",
     *          "matter_rename": "nullable|string",
     *          "group": "nullable|integer",
     *          "can_external_homologations": "required|boolean",
     *          "can_internal_homologations": "required|boolean",
     *          "sub_cur_integrative_type": "required|boolean",
     *          "calification_models_id" : "required|integer|exists:tenant.calification_models,id",
     *          "prerequisites" :  "nullable|array",
     *          "prerequisites.*" :  "integer|exists:tenant.subject_curriculum,id|distinct",
     *          "components" :  "nullable|array",
     *          "components.*.component_id" :  "integer|exists:tenant.components,id|distinct",
     *          "components.*.lea_workload" :  "integer",
     *          "status_id": "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(SubjectCurriculumRequest $request, SubjectCurriculum $subjectcurriculum);

    /**
     * @OA\Delete(
     *   path="/api/subject-curriculum/{subjectcurriculum}",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una materia y malla",
     *   description="Eliminar una materia y malla por Id",
     *   operationId="deletesubjectcurriculum",
     *   @OA\Parameter(
     *     name="subjectcurriculum",
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
    public function destroy(SubjectCurriculum $subjectcurriculum);

    /**
     * @OA\Patch(
     *   path="/api/subject-curriculum/{subjectcurriculum}",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Restaurar una materia y malla",
     *   description="Restaurar una materia y malla por Id",
     *   operationId="restartsubjectcurriculum",
     *   @OA\Parameter(
     *     name="subjectcurriculum",
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
    public function restoreSubjectRepository(Request $request, $id);

    /**
     * @OA\Get(
     *   path="/api/subject-curriculum/{subjectcurriculum}/prerequisites",
     *   tags={"SubjectCurriculum"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener las materias que son prerequisitos de una materia por malla",
     *   description="Muestra información específica de las materias que son prerequisitos de una materia malla por Id.",
     *   operationId="getsubjectcurriculumPrerequisites",
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
     *     name="subjectcurriculum",
     *     description="Id de la materia malla",
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
    public function showPrerequisites(SubjectCurriculum $subjectcurriculum);
}
