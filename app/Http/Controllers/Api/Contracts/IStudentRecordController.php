<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\StudentRecordRequest;
use App\Models\StudentRecord;
use App\Models\StudentRecordProgram;
use Illuminate\Http\Request;

interface IStudentRecordController
{
    /**
     * @OA\Get(
     *   path="/api/student-records",
     *   tags={"Record Estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los record estudiantil",
     *   description="Muestra todos los record estudiantil en formato JSON",
     *   operationId="getAllStudentRecords",
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
     *     name="search",
     *     description="Filtrar registros",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
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
     *   path="/api/student-records",
     *   tags={"Record Estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear record estudiantil",
     *   description="Crear un nuevo record estudiantil.",
     *   operationId="addRecordStudent",
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
     *           property="student_id",
     *           description="Id del estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Id del nivel educativo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mesh_id",
     *           description="Id de malla",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_student_id",
     *           description="Id del tipo de estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="economic_group_id",
     *           description="Id del grupo economico",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del record estudiantil",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "student_id": "required|integer|exists:students,id",
     *          "education_level_id": "required|integer|exists:education_levels,id",
     *          "mesh_id": "required|integer|exists:meshs,id",
     *          "type_student_id": "required|integer|exists:type_students,id",
     *          "economic_group_id" : "required|integer|exists:tenant.economic_groups,id",
     *          "status_id": "required|integer|exists:status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */

    public function store(StudentRecordRequest $request);

    /**
     * @OA\Get(
     *   path="/api/student-records/{id}",
     *   tags={"Record Estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un record estudiantil",
     *   description="Muestra información específica de un record estudiantil por Id.",
     *   operationId="getRecordStudent",
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
     *     description="Id del record estudiantil",
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
     *   path="/api/student-records/{studentRecord}",
     *   tags={"Record Estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar record estudiantil",
     *   description="Actualizar un record estudiantil.",
     *   operationId="updateRecordStudent",
     *   @OA\Parameter(
     *     name="studentRecord",
     *     description="Id del record estudiantil",
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
     *           property="student_id",
     *           description="Id del estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="education_level_id",
     *           description="Id del nivel educativo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mesh_id",
     *           description="Id de malla",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_student_id",
     *           description="Id del tipo de estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="economic_group_id",
     *           description="Id del grupo economico",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del record estudiantil",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "student_id": "required|integer|exists:students,id",
     *          "education_level_id": "required|integer|exists:education_levels,id",
     *          "pensum_id": "required|integer|exists:pensums,id",
     *          "type_student_id": "required|integer|exists:type_students,id",
     *          "economic_group_id" : "required|integer|exists:tenant.economic_groups,id",
     *          "status_id": "required|integer|exists:status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(StudentRecordRequest $request, StudentRecord $studentRecord);

    /**
     * @OA\Delete(
     *   path="/api/student-records/{studentRecord}",
     *   tags={"Record Estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un record estudiantil",
     *   description="Eliminar un record estudiantil por Id",
     *   operationId="deleteStudentRecords",
     *   @OA\Parameter(
     *     name="studentRecord",
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
    public function destroy(StudentRecord $studentRecord);

    /**
     * @OA\Get(
     *   path="/api/student-records/{studentRecordProgram}/type-student-programs",
     *   tags={"Record Estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar tipos de programas del estudiante que pertenecen al record del estudiante",
     *   description="Muestra tipos de programas del estudiante que pertenecen al record del estudiante en formato JSON",
     *   operationId="getStudentRecordProgramAndTypeStudentPrograms",
     *  @OA\Parameter(
     *     name="studentRecordProgram",
     *     description="Id del record estudiantil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
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
     *   @OA\Parameter(
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
    public function StudentRecordProgramAndTypeStudentPrograms(Request $request, StudentRecordProgram $studentRecordProgram);


}
