<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\StudentPhotoRequest;
use App\Http\Requests\UpdateStudentRequest;

interface IStudentController
{
    /**
     * @OA\Get(
     *   path="/api/students",
     *   tags={"Estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las estudiantes",
     *   description="Muestra todas los estudiantes paginados en formato JSON",
     *   operationId="getAllStudents",
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
     *     description="Ordenar por el campo (Para ordenar por modalidad o jornada la tabla de referencia Ej:modality.cat_name o daytrip.cat_name, para el resto de los campos no es necesario especificar nada mas",
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
     *   path="/api/students",
     *   tags={"Estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Registrar un estudiante junto con su usuario",
     *   description="Crear un nuevo registro de un estudiante con su usuario asociado.",
     *   operationId="addStudent",
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
     *           property="type_identification_id",
     *           description="Tipo de indentificación",
     *           type="integer",
     *           example="66 - 69",
     *         ),
     *         @OA\Property(
     *           property="pers_identification",
     *           description="Número de Identificación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_firstname",
     *           description="Primer nombre",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_secondname",
     *           description="Segundo nombre",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_first_lastname",
     *           description="Primer apellido",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_second_lastname",
     *           description="Segundo apellido",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_gender",
     *           description="Genero",
     *           type="string",
     *           example="Masculino/Femenino"
     *         ),
     *         @OA\Property(
     *           property="pers_date_birth",
     *           description="Fecha de nacimiento",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="pers_direction",
     *           description="Dirección domiciliaria",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_phone_home",
     *           description="Teléfono convencional",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_cell",
     *           description="Teléfono móvil",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_num_child",
     *           description="Número de hijos",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="pers_profession",
     *           description="Profesión",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_num_bedrooms",
     *           description="Número de dormitorios",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="pers_study_reason",
     *           description="Motivo de estudio",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_num_taxpayers_household",
     *           description="Número de contribuyentes en el hogar",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="pers_has_vehicle",
     *           description="Tiene vehiculo propio",
     *           type="integer",
     *           example="1/0"
     *         ),
     *         @OA\Property(
     *           property="vivienda_id",
     *           description="ID catalogo",
     *           type="integer",
     *           example="16 al 24",
     *         ),
     *         @OA\Property(
     *           property="type_religion_id",
     *           description="ID del tipo de religion",
     *           type="integer",
     *           example="35 - 44",
     *         ),
     *         @OA\Property(
     *           property="status_marital_id",
     *           description="ID del estado marital",
     *           type="integer",
     *           example="45 - 48",
     *         ),
     *         @OA\Property(
     *           property="city_id",
     *           description="ID de la ciudad natal",
     *           type="integer",
     *           example="49 - 53",
     *         ),
     *         @OA\Property(
     *           property="current_city_id",
     *           description="ID de la ciudad que actualmente se encuentra",
     *           type="integer",
     *           example="49 - 53",
     *         ),
     *         @OA\Property(
     *           property="sector_id",
     *           description="ID del sector",
     *           type="integer",
     *           example="54 - 59",
     *         ),
     *         @OA\Property(
     *           property="ethnic_id",
     *           description="ID de etnia",
     *           type="integer",
     *           example="60 - 65",
     *         ),
     *         @OA\Property(
     *           property="email",
     *           description="Correo electrónico del usuario",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="campus_id",
     *           description="Campus",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="modalidad_id",
     *           description="Modalidad",
     *           type="integer",
     *           example="70",
     *         ),
     *         @OA\Property(
     *           property="jornada_id",
     *           description="Jornada",
     *           type="integer",
     *           example="71 - 73",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "pers_identification"  : "required|string|unique:persons,pers_identification",
     *          "pers_firstname"       : "required|string",
     *          "pers_secondname"      : "required|string",
     *          "pers_first_lastname"  : "required|string",
     *          "pers_second_lastname" : "required|string",
     *          "pers_gender"     : "required|string",
     *          "pers_date_birth" : "required|date",
     *          "pers_direction"  : "required|string",
     *          "pers_phone_home" : "nullable|string",
     *          "pers_cell" : "nullable|string",
     *          "pers_num_child" : "nullable|integer",
     *          "pers_profession" : "nullable|string",
     *          "pers_num_bedrooms" : "nullable|integer",
     *          "pers_study_reason" : "nullable|string",
     *          "pers_num_taxpayers_household" : "nullable|integer",
     *          "pers_has_vehicle" : "nullable|digits_between:0,1",
     *          "vivienda_id"  : "required|integer|exists:tenant.catalogs,id",
     *          "type_religion_id"  : "required|integer|exists:catalogs,id",
     *          "status_marital_id" : "required|integer|exists:catalogs,id",
     *          "city_id"           : "required|integer|exists:catalogs,id",
     *          "current_city_id"   : "required|integer|exists:catalogs,id",
     *          "sector_id"         : "required|integer|exists:catalogs,id",
     *          "ethnic_id"         : "required|integer|exists:catalogs,id",
     *          "type_identification_id" : "required|integer|exists:catalogs,id",
     *          "email"      : "required|email|unique:tenant.users,email",
     *          "campus_id" : "required|integer|exists:tenant.campus,id",
     *          "modalidad_id" : "required|integer|exists:tenant.catalogs,id",
     *          "jornada_id" : "required|integer|exists:tenant.catalogs,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StoreStudentRequest $request);

    /**
     * @OA\Get(
     *   path="/api/students/{student}",
     *   tags={"Estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener la información de un estudiante",
     *   description="Obtener la información de un estudiante por su identificador",
     *   operationId="showStudent",
     *   @OA\Parameter(
     *     name="student",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function show(Request $request,Student $student);

    /**
     * @OA\Put(
     *   path="/api/students/{student}",
     *   tags={"Estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar la información de estudiante",
     *   description="Actualizar la información de estudiante.",
     *   operationId="updateStudent",
     *   @OA\Parameter(
     *     name="student",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
     *           property="stud_observation",
     *           description="Observación",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="campus_id",
     *           description="Campus",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="modalidad_id",
     *           description="Modalidad",
     *           type="integer",
     *           example="70",
     *         ),
     *         @OA\Property(
     *           property="jornada_id",
     *           description="Jornada",
     *           type="integer",
     *           example="71 - 73",
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
     *          "stud_observation" : "string",
     *          "campus_id" : "required|integer|exists:tenant.campus,id",
     *          "modalidad_id" : "required|integer|exists:tenant.catalogs,id",
     *          "jornada_id" : "required|integer|exists:tenant.catalogs,id",
     *          "status_id" : "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateStudentRequest $request, Student $student);

    /**
     * @OA\Delete(
     *   path="/api/students/{student}",
     *   tags={"Estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un estudiante",
     *   description="Eliminar un estudiante por Id",
     *   operationId="deleteStudent",
     *   @OA\Parameter(
     *     name="student",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function destroy(Student $student);

    /**
     * @OA\Post(
     *   path="/api/students/photo",
     *   tags={"Estudiantes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar la foto de perfil de estudiante",
     *   description="Actualizarla foto de perfil de estudiante.",
     *   operationId="updatePhotoStudent",
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
     *           property="files",
     *           description="Foto de perfil",
     *           type="array",
     *           @OA\Items(
     *              type="file"
     *           ),
     *         ),
     *         @OA\Property(
     *           property="period",
     *           description="Periodo de actualizacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_document",
     *           description="tipo de documento",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "photo" : "required|file",
     *          "period" : "integer",
     *          "type_document" : "required|integer|exists:landlord.type_documents,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function updatePhoto(StudentPhotoRequest $request);
}
