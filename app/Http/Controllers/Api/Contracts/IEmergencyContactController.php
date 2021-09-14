<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\EmergencyContact;
use Illuminate\Http\Request;
use App\Http\Requests\EmergencyContactFormRequest;

interface IEmergencyContactController
{

/**
     * @OA\Get(
     *   path="/api/emergency-contact",
     *   tags={"Contacto de Emergencia"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar contactos de emergencia",
     *   description="Muestra todas los contactos de emergencia en formato JSON",
     *   operationId="getAllEmergencyContact",
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
     *   path="/api/emergency-contact",
     *   tags={"Contacto de Emergencia"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear contacto de emergencia",
     *   description="Crear un nuevo contacto de emergencia.",
     *   operationId="addEmergencyContact",
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
     *           property="person_id",
     *           description="Id de la persona",
     *           type="integer",
     *         ),
     *          @OA\Property(
     *           property="emergencyContacts",
     *           description="Identificación de los obj contactos de emergencias",
     *           type="array",
     *           @OA\Items(
     *         @OA\Property(
     *           property="em_ct_name",
     *           description="Nombre del contacto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="em_ct_first_phone",
     *           description="Número teléfono principal del contacto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="em_ct_second_phone",
     *           description="Número teléfono secundario del contacto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_kinship_id",
     *           description="Parentesco",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del contacto de emergencia",
     *           type="integer",
     *         ),
     *          @OA\Property(
     *           property="person_id",
     *           description="Persona",
     *           type="integer",
     *         ),
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
    public function store(EmergencyContactFormRequest $request);//EmergencyContactFormRequest

     /**
     * @OA\Get(
     *   path="/api/emergency-contact/{id}",
     *   tags={"Contacto de Emergencia"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener contacto de emergencia",
     *   description="Muestra información específica de un contacto de emergencia por Id.",
     *   operationId="getEmergencyContact",
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
     *     description="Id del contacto de emergencia",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
     *   path="/api/emergency-contact/{emergencycontact}",
     *   tags={"Contacto de Emergencia"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar contacto de emergencia",
     *   description="Actualizar un contacto de emergencia.",
     *   operationId="updateEmergencyContact",
     *   @OA\Parameter(
     *     name="emergencycontact",
     *     description="Id del contacto de emergencia",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
     *           property="em_ct_name",
     *           description="Nombre del contacto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="em_ct_first_phone",
     *           description="Número teléfono principal del contacto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="em_ct_second_phone",
     *           description="Número teléfono secundario del contacto",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="type_kinship_id",
     *           description="Parentesco ",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la sede",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="person_id",
     *           description="Persona",
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
    public function update(Request $request, EmergencyContact $emergencycontact);

    /**
     * @OA\Delete(
     *   path="/api/emergency-contact/{emergencycontact}",
     *   tags={"Contacto de Emergencia"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar contacto de emergencia",
     *   description="Eliminar contacto de emergencia por Id",
     *   operationId="deleteEmergencyContact",
     *   @OA\Parameter(
     *     name="emergencycontact",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="2"
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
    public function destroy (EmergencyContact $emergencycontact);
}
