<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Http\Requests\ShowByUserProfileIdRequest;
use App\Http\Requests\StudentRecordProgramFormRequest;
use App\Models\StudentRecord;
use App\Models\StudentRecordProgram;


interface IStudentRecordProgramsController
{

    /**
     * @OA\Get(
     *   path="/api/student-record-programs",
     *   tags={"Programa de registro estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los programas de registro estudiantil",
     *   description="Muestra todas los programas de registro estudiantil en formato JSON",
     *   operationId="getAllStudentRecordPrograms",
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
    public function index(Request $request);


    /**
     * @OA\Post(
     *   path="/api/student-record-programs",
     *   tags={"Programa de registro estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear programa de registro estudiantil",
     *   description="Crear nuevo programa de registro estudiantil.",
     *   operationId="addStudentRecordPrograms",
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
     *          @OA\Property(
     *           property="student_record_id",
     *           description="Record de estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_student_program_id",
     *           description="Tipo programa para estudiantes",
     *           type="integer",
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
     *           "student_record_id": "required|integer|exists:student_records,id",
     *           "type_student_program_id": "required|integer|exists:type_student_programs,id",
     *           "status_id": "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StudentRecordProgramFormRequest $studentRecordProgramFormRequest);



    /**
     * @OA\Get(
     *   path="/api/student-record-programs/{id}",
     *   tags={"Programa de registro estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un programa de registro estudiantil.",
     *   description="Muestra información específica de un programa de registro estudiantil",
     *   operationId="getIdStudentRecordProgram",
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
     *     description="Id del programa de registro estudiantil",
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
     *   path="/api/student-record-programs/{studentRecordProgram}",
     *   tags={"Programa de registro estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar tipo documento",
     *   description="Actualizar un programa de registro estudiantilo.",
     *   operationId="updateStudentRecordPrograms",
     *   @OA\Parameter(
     *     name="studentRecordProgram",
     *     description="Id pograma de registro estudiantil",
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
     *          @OA\Property(
     *           property="student_record_id",
     *           description="Record de estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_student_program_id",
     *           description="Tipo programa para estudiantes",
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
     *           "student_record_id": "required|integer|exists:student_records,id",
     *           "type_student_program_id": "required|integer|exists:type_student_programs,id",
     *           "status_id": "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(StudentRecordProgramFormRequest $studentRecordProgramFormRequest, StudentRecordProgram $studentRecordProgram);


    /**
     * @OA\Delete(
     *   path="/api/student-record-programs/{studentRecordProgram}",
     *   tags={"Programa de registro estudiantil"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un programa de registro estudiantil",
     *   description="Eliminar un programa de registro estudiantil por Id",
     *   operationId="deleteStudentRecordPrograms",
     *   @OA\Parameter(
     *     name="studentRecordProgram",
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
    public function destroy(StudentRecordProgram $studentRecordProgram);


    public function listStudentRecordProgramAndTypeStudentPrograms(Request $request, StudentRecordProgram $studentRecordProgram);
}
