<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\MatterMeshDependenciesRequest;
use App\Http\Requests\MatterMeshRequest;
use App\Http\Requests\UpdateMatterMeshRequest;
use App\Models\MatterMesh;
use Illuminate\Http\Request;

interface IMatterMeshController
{
    /**
     * @OA\Get(
     *   path="/api/matter-mesh",
     *   tags={"MatterMesh"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las materias y mallas",
     *   description="Muestra todos los registros paginados en formato JSON",
     *   operationId="getAllMatterMesh",
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
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index (Request $request);

    /**
     * @OA\Post(
     *   path="/api/matter-mesh",
     *   tags={"MatterMesh"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar materia y malla",
     *   description="Crear un registro asociado de materia y malla.",
     *   operationId="addMatterMesh",
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
     *           property="matter_id",
     *           description="Id de matter",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mesh_id",
     *           description="Id de mesh",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="simbology_id",
     *           description="Id de simbology",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="calification_type",
     *           description="Tipo de calificacion",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="min_calification",
     *           description="Calificacion minima del tipo de calificacion",
     *           type="integer",
     *           format="float"
     *         ),
     *         @OA\Property(
     *           property="max_calification",
     *           description="Calificacion maxima del tipo de calificacion",
     *           type="integer",
     *           format="float"
     *         ),
     *         @OA\Property(
     *           property="num_fouls",
     *           description="Numero de faltas",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="matter_rename",
     *           description="Materia renombre",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="group",
     *           description="Grupo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "matter_id" : "required|integer",
     *          "mesh_id" : "required|integer",
     *          "simbology_id" : "integer|exists:tenant.simbologies,id",
     *          "calification_type" : "required",
     *          "min_calification" : "required",
     *          "max_calification" : "required",
     *          "num_fouls" : "required",
     *          "group" : "required",
     *          "matter_rename" : "required"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(MatterMeshRequest $request);

    /**
     * @OA\Post(
     *   path="/api/matter-mesh/{mattermesh}/dependencies",
     *   tags={"MatterMesh"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asignar dependencias a una materia y malla",
     *   description="Asigna materias que dependen de una materia y malla.",
     *   operationId="addMatterMeshDependencies",
     *   @OA\Parameter(
     *     name="mattermesh",
     *     description="Id del mattermesh",
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
     *           type="integer"
     *         ),
     *          @OA\Property(
     *           property="matterMesh",
     *           description="Array de id de mattermesh",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[7, 8]",
     *           uniqueItems=true
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Se ha asignado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "matterMesh" : "array",
     *          "matterMesh.*" : "integer|exists:tenant.matter_mesh,id|distinct",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function asignDependencies(MatterMeshDependenciesRequest $request, MatterMesh $mattermesh);

    /**
     * @OA\Get(
     *   path="/api/matter-mesh/{id}",
     *   tags={"MatterMesh"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una materia y malla",
     *   description="Muestra información específica de una materia y malla por Id.",
     *   operationId="getMatterMesh",
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
     *     description="Id de la materia y malla",
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
     * @OA\Get(
     *   path="/api/matter-mesh/{mattermesh}/dependencies",
     *   tags={"MatterMesh"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener las materias que dependen de una materia por malla",
     *   description="Muestra información específica las materias que dependen de una materia por malla por Id.",
     *   operationId="getMatterMeshDependencies",
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
     *     name="mattermesh",
     *     description="Id de la materia y malla",
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
    public function showDependencies(MatterMesh $mattermesh);

    /**
     * @OA\Put(
     *   path="/api/matter-mesh/{mattermesh}",
     *   tags={"MatterMesh"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar materias y mallas",
     *   description="Actualizar una materia y malla.",
     *   operationId="updateMatterMesh",
     *   @OA\Parameter(
     *     name="mattermesh",
     *     description="Id del mattermesh",
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
     *           property="matter_id",
     *           description="Id de la materia",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="mesh_id",
     *           description="Id de la malla",
     *           type="integer",
     *         ),
     *          @OA\Property(
     *           property="simbology_id",
     *           description="Id de simbology",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="calification_type",
     *           description="Tipo de calificacion",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="min_calification",
     *           description="Calificacion  minima",
     *           type="number",
     *           format="float"
     *         ),
     *         @OA\Property(
     *           property="max_calification",
     *           description="Calificacion  maxima",
     *           type="number",
     *           format="float"
     *         ),
     *         @OA\Property(
     *           property="num_fouls",
     *           description="Numero de faltas",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="group",
     *           description="Grupo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="order",
     *           description="Orden de asignacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "matter_id" : "required|integer",
     *          "mesh_id" : "required|integer",
     *          "simbology_id" : "integer|exists:tenant.simbologies,id",
     *          "calification_type" : "required",
     *          "min_calification" : "required",
     *          "max_calification" : "required",
     *          "num_fouls" : "required",
     *          "group" : "required",
     *          "matter_rename" : "required"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateMatterMeshRequest $request, MatterMesh $mattermesh);

    /**
     * @OA\Delete(
     *   path="/api/matter-mesh/{mattermesh}",
     *   tags={"MatterMesh"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una materia y malla",
     *   description="Eliminar una materia y malla por Id",
     *   operationId="deleteMatterMesh",
     *   @OA\Parameter(
     *     name="mattermesh",
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
    public function destroy(MatterMesh $mattermesh);

    /**
     * @OA\Patch(
     *   path="/api/matter-mesh/{mattermesh}",
     *   tags={"MatterMesh"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Restaurar una materia y malla",
     *   description="Restaurar una materia y malla por Id",
     *   operationId="restartMatterMesh",
     *   @OA\Parameter(
     *     name="mattermesh",
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
    public function restoreMatterMesh(Request $request, $id);
}
