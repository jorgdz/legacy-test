<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Collaborator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCollaboratorRequest;
use App\Http\Requests\UpdateCollaboratorRequest;

interface ICollaboratorController
{
    /**
     * @OA\Get(
     *   path="/api/collaborators",
     *   tags={"Colaboradores"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los colaboradores",
     *   description="Muestra todos los colaboradores en formato JSON",
     *   operationId="getAllCollaborators",
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
     *   path="/api/collaborators",
     *   tags={"Colaboradores"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Registrar un colaborador",
     *   description="Registrar un colaborador.",
     *   operationId="addCollaborator",
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
     *           property="pers_nationality",
     *           description="ID Catalogo Nacionalidad",
     *           type="integer",
     *           example="86 al 92",
     *         ),
     *         @OA\Property(
     *           property="pers_is_provider",
     *           description="Es proveedor",
     *           type="integer",
     *           example="1/0"
     *         ),
     *         @OA\Property(
     *           property="pers_has_disability",
     *           description="Tiene discapacidad",
     *           type="integer",
     *           example="1/0"
     *         ),
     *         @OA\Property(
     *           property="pers_disability_identification",
     *           description="Identificación de carnet de discapacidad",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_disability_percent",
     *           description="Porcentaje de discapacidad",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="pers_disabilities[]",
     *           description="Identificadores de discapacidades",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1, 2]",
     *           uniqueItems=true
     *         ),
     *         @OA\Property(
     *           property="vivienda_id",
     *           description="ID catalogo",
     *           type="integer",
     *           example="16 al 19",
     *         ),
     *         @OA\Property(
     *           property="type_religion_id",
     *           description="ID del tipo de religion",
     *           type="integer",
     *           example="39 - 47",
     *         ),
     *         @OA\Property(
     *           property="status_marital_id",
     *           description="ID del estado marital",
     *           type="integer",
     *           example="35 - 38",
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
     *           description="Correo electronico del usuario",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_identification_id_relatives_person",
     *           description="Tipo de indentificación del familiar, es requerido con el estatus marital de casado",
     *           type="integer",
     *           example="66 - 69",
     *         ),
     *         @OA\Property(
     *           property="pers_identification_relatives_person",
     *           description="Número de Identificación del familiar, es requerido con el estatus marital de casado",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_firstname_relatives_person",
     *           description="Primer nombre del familiar, es requerido con el estatus marital de casado",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_secondname_relatives_person",
     *           description="Segundo nombre del familiar, es requerido con el estatus marital de casado",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_first_lastname_relatives_person",
     *           description="Primer apellido del familiar, es requerido con el estatus marital de casado",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_second_lastname_relatives_person",
     *           description="Segundo apellido del familiar, es requerido con el estatus marital de casado",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pers_relatives_person_desc",
     *           description="Descripción de la relación, es requerido con el estatus marital de casado",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="coll_email",
     *           description="Correo electronico del colaborador",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="coll_type",
     *           description="Tipo de colaborador: D=DOCENCIA & A=ADMINISTRATIVO",
     *           type="string",
     *           example="D/A",
     *         ),
     *         @OA\Property(
     *           property="coll_journey_description",
     *           description="Tipo de jornada laboral: TC=Tiempo completo & MT=Medio tiempo & TP=Tiempo por Hora",
     *           type="string",
     *           example="TC/MT/TP",
     *         ),
     *         @OA\Property(
     *           property="coll_dependency",
     *           description="Trabaja bajo dependencia, es opcional para MT(Medio tiempo)",
     *           type="integer",
     *           example="1/0"
     *         ),
     *         @OA\Property(
     *           property="coll_journey_hours",
     *           description="Tiempo de jornada en horas, es requerido con el tipo de jornada laboral TP(Tiempo por Hora)",
     *           type="integer",
     *           example="12",
     *         ),
     *         @OA\Property(
     *           property="position_company_id",
     *           description="Cargo o posición",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="coll_entering_date",
     *           description="Fecha de ingreso del colaborador",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="coll_leaving_date",
     *           description="Fecha de salida del colaborador",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="coll_membership_num",
     *           description="Número de afiliación",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="coll_has_nomination",
     *           description="Tiene nombramiento",
     *           type="integer",
     *           example="1/0"
     *         ),
     *         @OA\Property(
     *           property="coll_nomination_entering_date",
     *           description="Fecha de inicio del nombramiento",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="coll_nomination_leaving_date",
     *           description="Fecha fin del nombramiento",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del colaborador",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="education_level_principal_id",
     *           description="Nivel de educacion principal asociado al colaborador",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="education_levels[]",
     *           description="Identificadores de los niveles de educacion",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1, 2]",
     *           uniqueItems=true
     *         ),
     *         @OA\Property(
     *           property="campus[]",
     *           description="Identificadores de los campus",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1, 2]",
     *           uniqueItems=true
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "pers_identification"  : "required|string|unique:tenant.persons,pers_identification",
     *          "pers_firstname"       : "required|string|max:255",
     *          "pers_secondname"      : "required|string|max:255",
     *          "pers_first_lastname"  : "required|string|max:255",
     *          "pers_second_lastname" : "required|string|max:255",
     *          "pers_gender"     : "nullable|string|max:255",
     *          "pers_date_birth" : "nullable|date",
     *          "pers_direction"  : "nullable|string|max:255",
     *          "pers_phone_home" : "nullable|string|max:255",
     *          "pers_cell" : "nullable|string|max:255",
     *          "pers_num_child" : "nullable|integer",
     *          "pers_profession" : "nullable|string|max:255",
     *          "pers_num_bedrooms" : "nullable|integer",
     *          "pers_study_reason" : "nullable|string|max:255",
     *          "pers_num_taxpayers_household" : "nullable|integer",
     *          "pers_has_vehicle" : "nullable|digits_between:0,1",
     *          "pers_nationality" : "nullable|string|max:255",
     *          "pers_is_provider" : "nullable|digits_between:0,1",
     *          "pers_has_disability" : "nullable|digits_between:0,1",
     *          "pers_disability_identification" : "nullable|string|max:10",
     *          "pers_disability_percent" : "nullable|integer",
     *          "pers_disabilities"  : "required_if:pers_has_disability,==,1|nullable|array",
     *          "pers_disabilities.*"  : "required_if:pers_has_disability,==,1|nullable|integer|exists:tenant.type_disabilities,id",
     *          "vivienda_id"  : "required|integer|exists:tenant.catalogs,id",
     *          "type_religion_id"  : "required|integer|exists:catalogs,id",
     *          "status_marital_id" : "required|integer|exists:catalogs,id",
     *          "city_id"           : "required|integer|exists:catalogs,id",
     *          "current_city_id"   : "required|integer|exists:catalogs,id",
     *          "sector_id"         : "required|integer|exists:catalogs,id",
     *          "ethnic_id"         : "required|integer|exists:catalogs,id",
     *          "type_identification_id" : "required|integer|exists:tenant.catalogs,id",
     *          "email"      : "required|email|unique:tenant.users,email",
     *          "type_identification_id_relatives_person": "required_if:status_marital_id,==,35|nullable|integer|exists:tenant.catalogs,id",
     *          "pers_identification_relatives_person" : "required_if:status_marital_id,==,35|nullable|unique:tenant.persons,pers_identification",
     *          "pers_firstname_relatives_person"       : "required_if:status_marital_id,==,35|nullable|string|max:255",
     *          "pers_secondname_relatives_person"      : "required_if:status_marital_id,==,35|nullable|string|max:255",
     *          "pers_first_lastname_relatives_person"  : "required_if:status_marital_id,==,35|nullable|string|max:255",
     *          "pers_second_lastname_relatives_person" : "required_if:status_marital_id,==,35|nullable|string|max:255",
     *          "pers_relatives_person_desc" : "required_if:status_marital_id,==,35|nullable|string|max:255",
     *          "coll_email"       : "required|email|unique:tenant.users,email",
     *          "coll_type"       : "required|string|max:1",
     *          "coll_journey_description"       : "required|string|max:3",
     *          "coll_dependency"       : "required_if:coll_journey_description,==,'MT'|nullable|digits_between:0,1",
     *          "coll_journey_hours"       : "required_if:coll_journey_description,==,'TP'|nullable|integer",
     *          "position_company_id"       : "required|integer|exists:tenant.positions,id",
     *          "coll_entering_date" : "required|date",
     *          "coll_leaving_date" : "nullable|date",
     *          "coll_membership_num"       : "nullable|integer",
     *          "coll_has_nomination"  : "nullable|digits_between:0,1",
     *          "coll_nomination_entering_date" : "nullable|date",
     *          "coll_nomination_leaving_date" : "nullable|date",
     *          "status_id" : "integer|exists:tenant.status,id",
     *          "education_level_principal_id":"required|integer|exists:tenant.education_levels,id",
     *          "education_levels":"required|array",
     *          "education_levels.*":"required|integer|exists:tenant.education_levels,id",
     *          "campus":"required|array",
     *          "campus.*":"required|integer|exists:tenant.campus,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(StoreCollaboratorRequest $request);

    /**
     * @OA\Get(
     *   path="/api/collaborators/{collaborator}",
     *   tags={"Colaboradores"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener la información de un colaborador",
     *   description="Obtener la información de un colaborador por su identificador",
     *   operationId="showCollaborator",
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
     *     name="collaborator",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function show(Request $request,Collaborator $student);

    /**
     * @OA\Put(
     *   path="/api/collaborators/{collaborator}",
     *   tags={"Colaboradores"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar colaborador",
     *   description="Actualizar un colaborador.",
     *   operationId="updateCollaborator",
     *   @OA\Parameter(
     *     name="collaborator",
     *     description="Id del colaborador",
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
     *           property="coll_email",
     *           description="Correo electronico del colaborador",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="coll_journey_description",
     *           description="Tipo de jornada laboral: TC=Tiempo completo & MT=Medio tiempo & TP=Tiempo por Hora",
     *           type="string",
     *           example="TC/MT/TP",
     *         ),
     *         @OA\Property(
     *           property="coll_dependency",
     *           description="Trabaja bajo dependencia, es opcional para MT(Medio tiempo)",
     *           type="integer",
     *           example="1/0"
     *         ),
     *         @OA\Property(
     *           property="coll_journey_hours",
     *           description="Tiempo de jornada en horas, es requerido con el tipo de jornada laboral TP(Tiempo por Hora)",
     *           type="integer",
     *           example="12",
     *         ),
     *         @OA\Property(
     *           property="position_company_id",
     *           description="Cargo o posición",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="coll_entering_date",
     *           description="Fecha de ingreso del colaborador",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="coll_leaving_date",
     *           description="Fecha de salida del colaborador",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="coll_membership_num",
     *           description="Número de afiliación",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="coll_has_nomination",
     *           description="Tiene nombramiento",
     *           type="integer",
     *           example="1/0"
     *         ),
     *         @OA\Property(
     *           property="coll_nomination_entering_date",
     *           description="Fecha de inicio del nombramiento",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="coll_nomination_leaving_date",
     *           description="Fecha fin del nombramiento",
     *           type="string",
     *           format="date",
     *           example="YYYY-MM-DD"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del colaborador",
     *           type="integer",
     *           example="1",
     *         ),
     *         @OA\Property(
     *           property="education_level_principal_id",
     *           description="Nivel de educacion principal asociado al colaborador",
     *           type="integer",
     *           example="1",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *           "clt_name" : "requierd|string",
     *           "status_id" : "integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateCollaboratorRequest $request, Collaborator $collaborator);

        /**
     * @OA\Patch(
     *   path="/api/collaborators/{collaborator}",
     *   tags={"Colaboradores"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Cambiar estado Colaborador",
     *   description="Alterna el estado del colaborador entre activo o inactivo por Id",
     *   operationId="statusCollaborator",
     *   @OA\Parameter(
     *     name="collaborator",
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
     *           property="coll_disabled_reason",
     *           description="Rason de la  desactivacion",
     *           type="string",
     *           example="muy vago este bro",
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
    public function changeStatus(Request $request, Collaborator $collaborator);

    /**
     * @OA\Delete(
     *   path="/api/collaborators/{collaborator}",
     *   tags={"Colaboradores"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar Colaborador",
     *   description="Eliminar colaborador por Id",
     *   operationId="deleteCollaborator",
     *   @OA\Parameter(
     *     name="collaborator",
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
    public function destroy(Collaborator $collaborator);

    /**
     * @OA\Get(
     *   path="/api/collaborators/{educationlevel}/per-education-level",
     *   tags={"Colaboradores"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener colaboradores por nivel educativo",
     *   description="Obtener todos los colaboradores por nivel educativo",
     *   operationId="getCollaboratorPerEducationLvl",
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
     *     name="educationlevel",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function getCollaboratorsPerEducationLvl ($educationlevel);
}
