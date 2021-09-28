<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Component;
use Illuminate\Http\Request;
use App\Http\Requests\ComponentFormRequest;
use App\Http\Requests\UpdateComponentRequest;

interface IComponentController
{
    /**
     * @OA\Get(
     *   path="/api/components",
     *   tags={"Componentes Aprendizaje"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar Componentes Aprendizaje",
     *   description="Muestra todos los Componentes Aprendizaje en formato JSON",
     *   operationId="getAllComponents",
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
     *     name="data",
     *     description="mostrar todos los datos sin paginacion (enviar all)",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
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
     *   path="/api/components",
     *   tags={"Componentes Aprendizaje"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear Componentes Aprendizaje",
     *   description="Crear un Componentes de Aprendizaje.",
     *   operationId="addComponent",
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
     *           property="com_acronym",
     *           description="Abreviatura del componente",
     *           type="string",
     *         ),
     *        @OA\Property(
     *           property="com_name",
     *           description="Nombre del componente",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del componente",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "com_acronym" : "required|string",
     *          "com_name"    : "required|string",
     *          "status_id"   : "required|integer",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(ComponentFormRequest $request);

/**
     * @OA\Get(
     *   path="/api/components/{id}",
     *   tags={"Componentes Aprendizaje"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un Componente de Aprendizaje",
     *   description="Muestra información específica de un Componentes de Aprendizaje por Id.",
     *   operationId="getComponent",
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
     *     description="Id del componente",
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
     *   path="/api/components/{component}",
     *   tags={"Componentes Aprendizaje"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar componente aprendizaje",
     *   description="Actualizar componente de aprendizaje.",
     *   operationId="updateComponent",
     *   @OA\Parameter(
     *     name="component",
     *     description="Id del componente",
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
     *           property="com_acronym",
     *           description="Abreviatura del componente",
     *           type="string",
     *         ),
     *        @OA\Property(
     *           property="com_name",
     *           description="Nombre del componente",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del componente",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "com_acronym" : "required|string",
     *          "com_name"    : "required|string",
     *          "status_id"   : "required|integer",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateComponentRequest $request, Component $component);

    /**
     * @OA\Delete(
     *   path="/api/components/{component}",
     *   tags={"Componentes Aprendizaje"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un Componente de Aprendizaje",
     *   description="Eliminar una Componentes de Aprendizaje por Id",
     *   operationId="deleteComponent",
     *   @OA\Parameter(
     *     name="component",
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
    public function destroy (Component $component);

}
