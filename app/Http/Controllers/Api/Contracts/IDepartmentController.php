<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DeparmentFormRequest;

interface IDepartmentController
{
    /**
     * @OA\Get(
     *   path="/api/departments",
     *   tags={"Departamento"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los departamentos",
     *   description="Muestra todos los departamentos con sus hijos en formato JSON",
     *   operationId="getAllDepartments",
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
     *     description="Filtrar registros por el campo nombre (solamente usar cuando se envia data/all)",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *     ),
     *   ),
     *    @OA\Parameter(
     *     name="status_id",
     *     description="Obtener children activos",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string"
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
     *   path="/api/departments",
     *   tags={"Departamento"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un departamento",
     *   description="Crear un departamento.",
     *   operationId="addDepartment",
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
     *           property="dep_name",
     *           description="Nombre del departemento",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="dep_description",
     *           description="Descripcion del departemento",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="parent_id",
     *           description="Relacion padre (ID de otro departamento)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del departamento",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "dep_name": "required|string|unique:tenant.departments,dep_name",
     *              "dep_description" : "nullable|string",
     *              "parent_id": "nullable|integer|exists:tenant.departments,id",
     *              "status_id": "required|integer|exists:tenant.status,id",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(DeparmentFormRequest $request);


    /**
     * @OA\Get(
     *   path="/api/departments/{id}",
     *   tags={"Departamento"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un departamento",
     *   description="Muestra información específica de un departamento por Id.",
     *   operationId="getDepartment",
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
     *     description="Id del departamento",
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
     *   path="/api/departments/{department}",
     *   tags={"Departamento"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar departamento",
     *   description="Actualizar un departamento.",
     *   operationId="updateDepartment",
     *   @OA\Parameter(
     *     name="department",
     *     description="Id del departamento",
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
     *           property="dep_name",
     *           description="Nombre del departemento",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="dep_description",
     *           description="Descripcion del departemento",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="parent_id",
     *           description="Relacion padre (ID de otro departamento)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del catalogo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "dep_name": "required|string|unique:tenant.departments,dep_name",
     *              "dep_description" : "nullable|string",
     *              "parent_id": "nullable|integer|exists:tenant.departments,id",
     *              "status_id": "required|integer|exists:tenant.status,id",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(DeparmentFormRequest $request, Department $department);

        /**
     * @OA\Put(
     *   path="/api/departments/{department}/status",
     *   tags={"Departamento"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar estado de departamento",
     *   description="Actualizar estado de departamento.",
     *   operationId="updateDepartment",
     *   @OA\Parameter(
     *     name="department",
     *     description="Id del departamento",
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
     *           property="status_id",
     *           description="Estado del catalogo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos", 
     *      @OA\JsonContent(
     *          example={
     *              "status_id": "required|integer|exists:tenant.status,id",
     *          },
     *      ),
     *   ),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function updateStatus(DeparmentFormRequest $request, Department $department);

    
    /**
     * @OA\Get(
     *   path="/api/departments/organizational",
     *   tags={"Departamento"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los departamentos sin relacion de padre",
     *   description="Muestra todos los departamentos",
     *   operationId="getAllDepartmentsWithoutParents",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function allWithoutParents();
    
    // public function destroy(Department $ecogroup);
}
