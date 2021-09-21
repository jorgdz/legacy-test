<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\StudentDocumentFormRequest;
use App\Models\Student;
use App\Models\StudentDocument;
use Illuminate\Http\Request;



interface IStudentDocumentController
{

    /**
     * @OA\Get(
     *   path="/api/student-document",
     *   tags={"Documentos estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los documentos estudiantes",
     *   description="Muestra la lista de documentos de estudiantes en formato JSON",
     *   operationId="getAllStudentDocuments",
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
     *   path="/api/student-document",
     *   tags={"Documentos estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear Documento Estudiantes",
     *   description="Subir el documento Estudiante.",
     *   operationId="addStudentDocument",
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
     *           property="stu_doc_name_file[]",
     *           description="Array file Documento del estudiante",
     *           type="array",
     *           @OA\Items(
     *             type="string",
     *             format="binary",
     *           ),
     *         
     *         ),
     *          @OA\Property(
     *           property="type_document_id",
     *           description="Id Tipo documento",
     *           type="integer",
     *         ),
     *          @OA\Property(
     *           property="student_id",
     *           description="Id Estudiante",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de documento estudiante",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "stu_doc_name_file" : "array|required|extensionFile",
     *          "type_document_id" : "required|integer|exists:tenant.type_document,id",
     *          "student_id" : "required|integer|exists:tenant.students,id",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StudentDocumentFormRequest $studentDocumentFormRequest);

    /**
     * @OA\Get(
     *   path="/api/student-document/{id}",
     *   tags={"Documentos estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un documento estudiante",
     *   description="Muestra información específica de un documento estudiante.",
     *   operationId="getIdStudentDocument",
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
     *     description="Id del Documento estudiante",
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
     * @OA\Delete(
     *   path="/api/student-document/{studentDocument}",
     *   tags={"Documentos estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un documento estudiante",
     *   description="Eliminar un documento estudiante por Id",
     *   operationId="deleteStudenDocument",
     *   @OA\Parameter(
     *     name="studentDocument",
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
    public function destroy(StudentDocument $studentDocument);




    /**
     * @OA\Get(
     *   path="/api/student-document/download/{filename}",
     *   tags={"Documentos estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Descargar documento estudiante",
     *   description="Descargar estudiante documento estudiante.",
     *   operationId="getDownloadStudentDocument",
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
     *     name="filename",
     *     description="Nombre del Documento estudiante",
     *     in="path",
     *     required=true,
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
    public function download($filename);
}
