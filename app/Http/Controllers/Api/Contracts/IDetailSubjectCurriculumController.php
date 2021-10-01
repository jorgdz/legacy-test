<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\DetailSubjectCurriculum;
use Illuminate\Http\Request;
use App\Http\Requests\DetailSubjectCurriculumFormRequest;
use App\Http\Requests\UpdateDetailSubjectCurriculumRequest;

interface IDetailSubjectCurriculumController
{
    /**
     * @OA\Get(
     *   path="/api/details-subject-curriculum",
     *   tags={"Detalle Materia Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar Detalles de Materias Malla",
     *   description="Muestra todos los Detalle Materias Malla en formato JSON",
     *   operationId="getAllDetailsMatterMesh",
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
     *     description="mostrar todos los datos sin paginacion (enviar all)",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
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
     *   path="/api/details-subject-curriculum",
     *   tags={"Detalle Materia Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear Detalle Materia Malla",
     *   description="Crear un Detalle Materia Malla.",
     *   operationId="adddetailsubjectcurriculum",
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
     *           property="matter_mesh_id",
     *           description="ID Materia Malla",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="components_id",
     *           description="ID Componente",
     *           type="int",
     *         ),
     *        @OA\Property(
     *           property="dem_workload",
     *           description="Carga  Horaria",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del componente",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "matter_mesh_id" : "required|integer|exists:tenant.subject_curriculum,id",
     *          "components_id"  : "required|integer|exists:tenant.components,id",
     *          "dem_workload"   : "required|integer",
     *          "status_id"      : "required|integer",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(DetailSubjectCurriculumFormRequest $request);

    /**
     * @OA\Get(
     *   path="/api/details-subject-curriculum/{id}",
     *   tags={"Detalle Materia Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un Detalle Materia Malla",
     *   description="Muestra información específica de un Detalle Materia Malla por Id.",
     *   operationId="getdetailsubjectcurriculum",
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
     *     description="Id detalle materia malla",
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
     *   path="/api/details-subject-curriculum/{detailsubjectcurriculum}",
     *   tags={"Detalle Materia Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar Detalle Materia Malla",
     *   description="Actualizar un Detalle Materia Malla.",
     *   operationId="updatedetailsubjectcurriculum",
     *   @OA\Parameter(
     *     name="detailsubjectcurriculum",
     *     description="Id detalle materia malla",
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
     *       mediaType="multipart/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="matter_mesh_id",
     *           description="ID Materia Malla",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="components_id",
     *           description="ID Componente",
     *           type="int",
     *         ),
     *        @OA\Property(
     *           property="dem_workload",
     *           description="Carga  Horaria",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del componente",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "matter_mesh_id" : "required|integer|exists:tenant.subject_curriculum,id",
     *          "components_id"  : "required|integer|exists:tenant.components,id",
     *          "dem_workload"   : "required|integer",
     *          "status_id"      : "required|integer",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateDetailSubjectCurriculumRequest $request, DetailSubjectCurriculum $detailsubjectcurriculum);

    /**
     * @OA\Delete(
     *   path="/api/details-subject-curriculum/{detailsubjectcurriculum}",
     *   tags={"Detalle Materia Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un Detalle Materia Malla",
     *   description="Eliminar un Detalle Materia Malla por Id",
     *   operationId="deletedetailsubjectcurriculum",
     *   @OA\Parameter(
     *     name="detailsubjectcurriculum",
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
    public function destroy (DetailSubjectCurriculum $detailsubjectcurriculum);

}
