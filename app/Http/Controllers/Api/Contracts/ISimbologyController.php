<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\SimbologyRequest;
use App\Http\Requests\UpdateSimbologyRequest;
use App\Models\Simbology;
use Illuminate\Http\Request;

interface ISimbologyController
{
     /**
     * @OA\Get(
     *   path="/api/simbologies",
     *   tags={"Simbologias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las simbologias",
     *   description="Muestra todas las simbologias paginadas en formato JSON",
     *   operationId="getAllSimbologies",
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
     *     description="Mostrar todos los datos sin paginacion (enviar all)",
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
     *   path="/api/simbologies",
     *   tags={"Simbologias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear simbologia",
     *   description="Crear una nueva simbologia.",
     *   operationId="addSimbology",
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
     *           property="sim_color",
     *           description="Color de la simbologia en codigo Hexadecimal",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="sim_description",
     *           description="Descripción de la simbologia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la simbologia",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "sim_color" : "required|string",
     *          "sim_description" : "required|string|unique:tenant.simbologies,sim_description",
     *          "status_id" : "required|integer|exists:status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store (SimbologyRequest $request);

    /**
     * @OA\Get(
     *   path="/api/simbologies/{simbology}",
     *   tags={"Simbologias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener información de una simbologia",
     *   description="Muestra información específica de una simbologia.",
     *   operationId="showSimbology",
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
     *     name="simbology",
     *     description="Id de la simbologia",
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
    public function show(Simbology $simbology);

    /**
     * @OA\Put(
     *   path="/api/simbologies/{simbology}",
     *   tags={"Simbologias"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar información de una simbologia",
     *   description="Actualizar información de una simbologia.",
     *   operationId="updateSimbology",
     *   @OA\Parameter(
     *     name="simbology",
     *     description="Id de la simbologia",
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
     *           property="sim_color",
     *           description="Color de la simbologia en codigo Hexadecimal",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="sim_description",
     *           description="Descripción de la simbologia",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la simbologia",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *       "sim_color" : "required|string",
     *       "sim_description" : "required|string|unique:tenant.simbologies,sim_description,{$this->route('simbology')->id}",
     *       "status_id" : "required|integer|exists:status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateSimbologyRequest $request, Simbology $simbology);
}
