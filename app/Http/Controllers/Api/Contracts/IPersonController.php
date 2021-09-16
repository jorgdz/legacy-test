<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\StoreAssignPersonJobsRequest;
use App\Http\Requests\UpdateLanguagesPersonRequest;
interface IPersonController {

    /**
     * @OA\Get(
     *   path="/api/persons",
     *   tags={"Personas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las personas",
     *   description="Muestra todos las personas en formato JSON",
     *   operationId="getAllPersons",
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
     *   path="/api/persons",
     *   tags={"Personas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una persona",
     *   description="Crear una nueva persona.",
     *   operationId="addPerson",
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
     *           description="ID del tipo de identificacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="pers_identification",
     *           description="Numero de identificacion",
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
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="pers_direction",
     *           description="Direccion",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_phone_home",
     *           description="Telefono convencional",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_cell",
     *           description="Telefono personal",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_num_child",
     *           description="Numero de hijos",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="pers_profession",
     *           description="Profesion",
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
     *         ),
     *         @OA\Property(
     *           property="vivienda_id",
     *           description="ID catalogo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_religion_id",
     *           description="ID del tipo de religion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_marital_id",
     *           description="ID del estado marital",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="city_id",
     *           description="ID de la ciudad natal",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="current_city_id",
     *           description="ID de la ciudad que actualmente se encuentra",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="sector_id",
     *           description="ID del sector",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="ethnic_id",
     *           description="ID de etnia",
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
     *          "type_religion_id"  : "required|integer|exists:type_religions,id",
     *          "status_marital_id" : "required|integer|exists:status_marital,id",
     *          "city_id"           : "required|integer|exists:cities,id",
     *          "current_city_id"   : "required|integer|exists:cities,id",
     *          "sector_id"         : "required|integer|exists:sectors,id",
     *          "ethnic_id"         : "required|integer|exists:ethnics,id",
     *          "type_identification_id" : "required|integer|exists:type_identifications,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(PersonRequest $request);

        /**
    * @OA\Post(
    *   path="/api/persons/{person}/jobs",
    *   tags={"Personas"},
    *   security={
    *      {"api_key_security": {}},
    *   },
    *   summary="Assignar varios person_job",
    *   description="Assignar varias relaciones person_job.",
    *   operationId="assignPersonJob",
    *   @OA\Parameter(
    *     name="person",
    *     description="Id de la persona",
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
    *           property="jobs",
    *           description="Array de trabajos",
    *           type="array",
    *           items={
    *               "type" : "object",
    *               "properties" : {
    *                   "per_job_organization" : {
    *                       "type" : "string"
    *                   },
    *                   "per_job_position" : {
    *                       "type" : "string"
    *                   },
    *                   "per_job_direction" : {
    *                       "type" : "string"
    *                   },
    *                   "per_job_phone" : {
    *                       "type" : "string"
    *                   },
    *                   "per_job_start_date" : {
    *                       "type" : "string",
    *                       "format" : "date"
    *                   },
    *                   "per_job_end_date" : {
    *                       "type" : "string",
    *                       "format" : "date"
    *                   },
    *                   "per_job_current" : {
    *                       "type" : "integer"
    *                   },
    *                   "per_job_iess_affiliated" : {
    *                       "type" : "integer"
    *                   },
    *                   "city_id" : {
    *                       "type" : "integer"
    *                   },
    *                   "status_id" : {
    *                       "type" : "integer"
    *                   },
    *               }
    *           }
    *         ),
    *       ),
    *     ),
    *   ),
    *   @OA\Response(response=201, description="Se ha creado correctamente"),
    *   @OA\Response(response=400, description="No se cumple todos los requisitos",
    *   @OA\JsonContent(
    *      example={
    *         "jobs" : "required|array",
    *        "per_job_organization" : "nullable|string",
    *        "per_job_position" : "nullable|string",
    *        "per_job_direction" : "nullable|string",
    *        "per_job_phone" : "nullable|string|max:20",
    *        "start_date" : "nullable|date",
    *        "end_date"   : "nullable|date",
    *        "per_job_current" : "nullable|boolean",
    *        "per_job_iess_affiliated" : "nullable|boolean",
    *        "city_id"   : "required|integer|exists:tenant.cities,id",
    *        "status_id"  : "required|integer|exists:tenant.status,id"
    *      },
    *   )),
    *   @OA\Response(response=401, description="No autenticado"),
    *   @OA\Response(response=403, description="No autorizado"),
    *   @OA\Response(response=500, description="Error interno del servidor")
    * )
    *
    */
    public function assignJobs (StoreAssignPersonJobsRequest $request, Person $person);

    /**
     * @OA\Get(
     *   path="/api/persons/{id}",
     *   tags={"Personas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una persona",
     *   description="Muestra información específica de una persona por Id.",
     *   operationId="getPerson",
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
     *     description="Id de la persona",
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
     *   path="/api/persons/{person}",
     *   tags={"Personas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar persona",
     *   description="Actualizar una persona.",
     *   operationId="updatePerson",
     *   @OA\Parameter(
     *     name="person",
     *     description="Id de la persona",
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
     *           property="type_identification_id",
     *           description="ID del tipo de identificacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="pers_identification",
     *           description="Numero de identificacion",
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
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="pers_direction",
     *           description="Direccion",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_phone_home",
     *           description="Telefono convencional",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_cell",
     *           description="Telefono personal",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_num_child",
     *           description="Numero de hijos",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="pers_profession",
     *           description="Profesion",
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
     *         ),
     *         @OA\Property(
     *           property="vivienda_id",
     *           description="ID catalogo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_religion_id",
     *           description="ID del tipo de religion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_marital_id",
     *           description="ID del estado marital",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="city_id",
     *           description="ID de la ciudad natal",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="current_city_id",
     *           description="ID de la ciudad que actualmente se encuentra",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="sector_id",
     *           description="ID del sector",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="ethnic_id",
     *           description="ID de etnia",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "pers_identification"  : "required|string|unique:persons,pers_identification,person->id",
     *          "pers_firstname"       : "required|string",
     *          "pers_secondname"      : "required|string",
     *          "pers_first_lastname"  : "required|string",
     *          "pers_second_lastname" : "required|string",
     *          "pers_gender"          : "required|string",
     *          "pers_date_birth"      : "required|date",
     *          "pers_direction"       : "required|string",
     *          "type_religion_id"     : "required|integer|exists:type_religions,id",
     *          "status_marital_id"    : "required|integer|exists:status_marital,id",
     *          "city_id"              : "required|integer|exists:cities,id",
     *          "current_city_id"      : "required|integer|exists:cities,id",
     *          "sector_id"            : "required|integer|exists:sectors,id",
     *          "ethnic_id"            : "required|integer|exists:ethnics,id",
     *          "type_identification_id" : "required|integer|exists:type_identifications,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(PersonRequest $request, Person $person);

    /**
     * @OA\Delete(
     *   path="/api/persons/{person}",
     *   tags={"Personas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una persona",
     *   description="Eliminar una persona por Id",
     *   operationId="deletePerson",
     *   @OA\Parameter(
     *     name="person",
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
    public function destroy(Person $person);

    /**
     * @OA\Post(
     *   path="/api/persons/{person}/languages",
     *   tags={"Lenguajes por usuario"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Guardar arreglo de lenguajes por Person",
     *   description="Guardar arreglo de lenguajes por Person",
     *   operationId="savedLanguageByPerson",
     *   @OA\Parameter(
     *     name="person",
     *     description="Persona",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
     *           property="languages",
     *           description="Array languages",
     *           type="array",
     *           @OA\Items(
     *             type="integer",
     *             example="1"
     *           ),
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
    public function updateLanguagePerson(UpdateLanguagesPersonRequest $request, Person $person);
}
