<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Models\StudentRecordPeriod;
use App\Http\Requests\StudentRecordPeriodRequest;

interface IStudentRecordPeriodController
{
    /**
     * @OA\Get(
     *   path="/api/student-records-period",
     *   tags={"Registros de estudiantes por periodo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los registros de estudiantes por periodo",
     *   description="Muestra todas los registros de estudiantes por periodo en formato JSON",
     *   operationId="getAllStudentRecordsPeriod",
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
     *   path="/api/student-records-period",
     *   tags={"Registros de estudiantes por periodo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear registro de estudiante por periodo",
     *   description="Crear un nuevo registro de estudiante por periodo.",
     *   operationId="addStudentRecordPeriod",
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
     *           property="student_record_id",
     *           description="Record del estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="periodo_id",
     *           description="Periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_student_id",
     *           description="Estado del estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del registro del estudiante",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "student_record_id": "required|integer|exists:tenant.student_records,id",
     *          "periodo_id": "required|integer|exists:tenant.periods,id",
     *          "status_student_id": "required|integer|exists:tenant.status_students,id",
     *          "status_id": "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StudentRecordPeriodRequest $request);

    /**
     * @OA\Get(
     *   path="/api/student-records-period/{id}",
     *   tags={"Registros de estudiantes por periodo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un registro de estudiante por periodo",
     *   description="Muestra información específica de un registro de estudiante de un periodo por Id.",
     *   operationId="getStudentRecordPeriod",
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
     *     description="Id del registro de estudiante por periodo",
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
     *   path="/api/student-records-period/{studentRecordPeriod}",
     *   tags={"Registros de estudiantes por periodo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar registro de estudiante por periodo",
     *   description="Actualizar un registro de estudiante por periodo.",
     *   operationId="updateStudentRecordPeriod",
     *   @OA\Parameter(
     *     name="studentRecordPeriod",
     *     description="Id del registro de estudiante por periodo",
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
     *           property="student_record_id",
     *           description="Record del estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="periodo_id",
     *           description="Periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_student_id",
     *           description="Estado del estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del registro del estudiante",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "student_record_id": "nullable|integer|exists:tenant.student_records,id",
     *          "periodo_id": "nullable|integer|exists:tenant.periods,id",
     *          "status_student_id": "nullable|integer|exists:tenant.status_students,id",
     *          "status_id": "nullable|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(StudentRecordPeriodRequest $request, StudentRecordPeriod $studentRecordPeriod);

    /**
     * @OA\Delete(
     *   path="/api/student-records-period/{studentRecordPeriod}",
     *   tags={"Registros de estudiantes por periodo"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un registro de estudiante por periodo",
     *   description="Eliminar una registro de estudiante por periodo por Id",
     *   operationId="deleteStudentRecordPeriod",
     *   @OA\Parameter(
     *     name="studentRecordPeriod",
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
    public function destroy(StudentRecordPeriod $studentRecordPeriod);
}