<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\LearningComponent;
use Illuminate\Http\Request;
use App\Http\Requests\LearningComponentFormRequest;
use App\Http\Requests\UpdateLearningComponentRequest;

interface ILearningComponentController
{
    /**
     * @OA\Get(
     *   path="/api/learning-components",
     *   tags={"Componente Aprendizaje Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar Componentes Aprendizaje Malla",
     *   description="Muestra todos los Componentes Aprendizaje Malla en formato JSON",
     *   operationId="getAllLearningComponents",
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
     *   path="/api/learning-components",
     *   tags={"Componente Aprendizaje Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear Componente Aprendizaje Malla",
     *   description="Crear un Componente Aprendizaje Malla.",
     *   operationId="addLearningComponent",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mesh_id",
     *           description="ID  Malla",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="component_id",
     *           description="ID Componente",
     *           type="int",
     *         ),
     *        @OA\Property(
     *           property="lea_workload",
     *           description="Carga Horaria (si se envia null o empty se calcula el valor de forma automatica)",
     *           type="int",
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
     *          "mesh_id"      : "required|integer|exists:tenant.meshs,id",
     *          "component_id" : "required|integer|exists:tenant.components,id",
     *          "status_id"    : "required|integer",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(LearningComponentFormRequest $request);

/**
     * @OA\Get(
     *   path="/api/learning-components/{id}",
     *   tags={"Componente Aprendizaje Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un Componente Aprendizaje Malla",
     *   description="Muestra información específica de un Componente Aprendizaje Malla por Id.",
     *   operationId="getLearningComponenet",
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
     *     description="Id componente aprendizaje malla",
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
     *   path="/api/learning-components/{learningcomponent}",
     *   tags={"Componente Aprendizaje Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar Componente Aprendizaje Malla",
     *   description="Actualizar un Componente Aprendizaje Malla.",
     *   operationId="updateLearningComponent",
     *   @OA\Parameter(
     *     name="learningcomponent",
     *     description="Id componente aprendizaje malla",
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
     *       mediaType="multipart/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mesh_id",
     *           description="ID Malla",
     *           type="int",
     *         ),
     *         @OA\Property(
     *           property="component_id",
     *           description="ID Componente",
     *           type="int",
     *         ),
     *        @OA\Property(
     *           property="lea_workload",
     *           description="Carga Horaria (si se envia null o empty se calcula el valor de forma automatica)",
     *           type="int",
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
     *          "mesh_id"      : "required|integer|exists:tenant.meshs,id",
     *          "component_id" : "required|integer|exists:tenant.components,id",
     *          "status_id"    : "required|integer",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateLearningComponentRequest $request, LearningComponent $learningcomponent);

    /**
     * @OA\Delete(
     *   path="/api/learning-components/{learningcomponent}",
     *   tags={"Componente Aprendizaje Malla"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar Componente Aprendizaje Malla",
     *   description="Eliminar un Componente Aprendizaje Malla por Id",
     *   operationId="deleteLearningComponent",
     *   @OA\Parameter(
     *     name="learningcomponent",
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
    public function destroy (LearningComponent $learningcomponent);

}
