<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StoreStudentRequest;

interface IStudentController
{

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
     *         ),
     *         @OA\Property(
     *           property="type_religion_id",
     *           description="Tipo de religión",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_marital_id",
     *           description="Estado civil",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="city_id",
     *           description="Ciudad de nacimiento",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="current_city_id",
     *           description="Ciudad de actual de residencia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="sector_id",
     *           description="Sector asociado a la residencia actual",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="ethnic_id",
     *           description="Étnia",
     *           type="integer",
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
     *         ),
     *         @OA\Property(
     *           property="jornada_id",
     *           description="Jornada",
     *           type="integer",
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
     *          "type_religion_id"  : "required|integer|exists:type_religions,id",
     *          "status_marital_id" : "required|integer|exists:status_marital,id",
     *          "city_id"           : "required|integer|exists:cities,id",
     *          "current_city_id"   : "required|integer|exists:cities,id",
     *          "sector_id"         : "required|integer|exists:sectors,id",
     *          "ethnic_id"         : "required|integer|exists:ethnics,id",
     *          "type_identification_id" : "required|integer|exists:type_identifications,id",
     *          "email"      : "required|email|unique:tenant.users,email",
     *          "campus_id" : "required|integer|exists:tenant.campus,id",
     *          "modalidad_id" : "required|integer|exists:tenant.modalities,id",
     *          "jornada_id" : "required|integer|exists:tenant.type_daytrip,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */

    public function store(StoreStudentRequest $request);

    public function show($id);

    public function update(Request $request, Student $studentRecord);

    public function destroy(Student $studentRecord);

}
