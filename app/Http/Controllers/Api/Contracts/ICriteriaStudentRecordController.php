<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\CriteriaStudentRecordRequest;
use App\Models\CriteriaStudentRecord;
use Illuminate\Http\Request;

interface ICriteriaStudentRecordController
{
    /**
     * @OA\Get(
     *   path="/api/criteria-students-records",
     *   tags={"CriteriaStudentRecord"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los criterios del record estudiantil",
     *   description="Muestra todos los criterios del record estudiantil en formato JSON",
     *   operationId="getAllCriteriaStudentRecord",
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
     *   path="/api/criteria-students-records",
     *   tags={"CriteriaStudentRecord"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear criterio record estudiantil",
     *   description="Crear un nuevo criterio record estudiantil.",
     *   operationId="addCriteriaStudentRecord",
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
     *           property="qualification",
     *           description="Calificacion",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_criteria_id",
     *           description="Id del tipo de criterio",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="student_record_id",
     *           description="Id del record estudiantil",
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

    public function store(CriteriaStudentRecordRequest $request);

    /**
     * @OA\Get(
     *   path="/api/criteria-students-records/{id}",
     *   tags={"CriteriaStudentRecord"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un criterio record estudiantil",
     *   description="Muestra información específica de un criterio record estudiantil por Id.",
     *   operationId="getCriteriaStudentRecord",
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
     *     description="Id del criterio record estudiantil",
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
     *   path="/api/criteria-students-records/{criteriaStudentRecord}",
     *   tags={"CriteriaStudentRecord"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar criterio record estudiantil",
     *   description="Actualizar un criterio record estudiantil.",
     *   operationId="updateCriteriaStudentRecord",
     *   @OA\Parameter(
     *     name="criteriaStudentRecord",
     *     description="Id del criterio record estudiantil",
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
     *           property="qualification",
     *           description="Calificacion",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_criteria_id",
     *           description="Id del tipo de criterio",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="student_record_id",
     *           description="Id del record estudiantil",
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
    public function update(CriteriaStudentRecordRequest $request, CriteriaStudentRecord $criteriaStudentRecord);

    /**
     * @OA\Delete(
     *   path="/api/criteria-students-records/{criteriaStudentRecord}",
     *   tags={"CriteriaStudentRecord"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un criterio record estudiantil",
     *   description="Eliminar un criterio record estudiantil por Id",
     *   operationId="deleteCriteriaStudentRecord",
     *   @OA\Parameter(
     *     name="criteriaStudentRecord",
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
    public function destroy(CriteriaStudentRecord $criteriaStudentRecord);
}
