<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\StorePersonJobRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\PersonJob;

interface IPersonJobController
{
    /**
     * @OA\Get(
     *   path="/api/person-job",
     *   tags={"Trabajo Persona"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los trabajos por persona",
     *   description="Muestra todos los trabajos por persona paginadas en formato JSON",
     *   operationId="getAllJobs",
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
     *     name="search",
     *     description="buscar en el modelo",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="name"
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
     *     description="Ordenar por columna",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="id"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="type_sort",
     *     description="Sentido del Orden",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="desc"
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
     *   path="/api/person-job",
     *   tags={"Trabajo Persona"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear person_job",
     *   description="Crear una nueva relacion person_job.",
     *   operationId="addPersonJob",
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
     *           property="per_job_organization",
     *           description="Organizacion",
     *         ),
     *         @OA\Property(
     *           property="per_job_position",
     *           description="Posicion",
     *         ),
     *         @OA\Property(
     *           property="per_job_direction",
     *           description="Direccion",
     *         ),
     *         @OA\Property(
     *           property="per_job_phone",
     *           description="Telefono",
     *           type="integer"
     *         ),
     *         @OA\Property(
     *           property="per_job_start_date",
     *           description="fecha de inicio",
     *           type="string",
     *           format="date"
     *         ),
     *         @OA\Property(
     *           property="per_job_end_date",
     *           description="fecha de fin",
     *           type="string",
     *           format="date"
     *         ),
     *         @OA\Property(
     *           property="per_job_current",
     *           description="Trabaja actualmente",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="city_id",
     *           description="Id de la ciudad",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="person_id",
     *           description="Id de la persona",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Id del estado",
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
    public function store (StorePersonJobRequest $request);

    /**
     * @OA\Get(
     *   path="/api/person-job/{id}",
     *   tags={"Trabajo Persona"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener información de un person_job",
     *   description="Muestra información específica de un person_job.",
     *   operationId="showPersonJob",
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
     *     description="Id del person_job",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
     *   path="/api/person-job/{personjob}",
     *   tags={"Trabajo Persona"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar información de un person_job",
     *   description="Actualizar información de un person_job.",
     *   operationId="updatePersonJob",
     *   @OA\Parameter(
     *     name="personjob",
     *     description="Id del personJob",
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
     *           property="per_job_organization",
     *           description="Organizacion",
     *         ),
     *         @OA\Property(
     *           property="per_job_position",
     *           description="Posicion",
     *         ),
     *         @OA\Property(
     *           property="per_job_direction",
     *           description="Direccion",
     *         ),
     *         @OA\Property(
     *           property="per_job_phone",
     *           description="Telefono",
     *           type="integer"
     *         ),
     *         @OA\Property(
     *           property="per_job_start_date",
     *           description="fecha de inicio",
     *           type="string",
     *           format="date"
     *         ),
     *         @OA\Property(
     *           property="per_job_end_date",
     *           description="fecha de fin",
     *           type="string",
     *           format="date"
     *         ),
     *         @OA\Property(
     *           property="per_job_current",
     *           description="Trabaja actualmente",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="city_id",
     *           description="Id de la ciudad",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="person_id",
     *           description="Id de la persona",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Id del estado",
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
    public function update(StorePersonJobRequest $request, PersonJob $personjob);

     /**
     * @OA\Delete(
     *   path="/api/person-job/{personjob}",
     *   tags={"Trabajo Persona"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un person_job",
     *   description="Eliminar un person_job por Id",
     *   operationId="deletePersonJob",
     *   @OA\Parameter(
     *     name="personjob",
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
    public function destroy(PersonJob $personjob);
}
