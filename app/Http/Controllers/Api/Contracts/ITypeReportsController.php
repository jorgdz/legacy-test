<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\TypeReport;
use Illuminate\Http\Request;
use App\Http\Requests\TypeReportRequest;

interface ITypeReportsController
{
    /**
     * @OA\Get(
     *   path="/api/type-reports",
     *   tags={"Tipos de reportes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de reportes",
     *   description="Muestra todos los tipos de reportes paginados en formato JSON",
     *   operationId="getAllTypeReport",
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
    public function index(Request $request);

    /**
     * @OA\Post(
     *   path="/api/type-reports",
     *   tags={"Tipos de reportes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear un tipo de reporte",
     *   description="Crear un nuevo tipo de reporte.",
     *   operationId="addTypeReport",
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
     *           property="name",
     *           description="Nombre del tipo de reporte",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="acronym",
     *           description="Siglas del tipo de reporte",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="descripcion del tipo de reporte",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="rrhh",
     *           description="El recurso es de rrhh",
     *           type="boolean",
     *           example="0"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de reporte",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="signatures",
     *           description="Array de firma (Si pasas en rrhh 0 tomar el primer valor, si rrhh 1 tomar el segundo valor)",
     *           type="array",
     *           items={
     *               "type": "object",
     *               "properties" : {
     *                  "sign_person(rrhh=0)||collaborator_id(rrhh=1)" : {
     *                   },
     *                   "sign_position(rrhh=0)||position_id(rrhh=1)" : {
     *                   },
     *                   "sign_reference" : {
     *                       "type": "string"
     *                   },
     *                   "status_id" : {
     *                       "type": "integer"
     *                   },
     *               }
     *           },
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "name": "required|string",
     *          "acronym": "required|string|max:5|unique:tenant.type_reports,acronym",
     *          "description": "nullable|string",
     *          "rrhh": "required|boolean",
     *          "status_id": "required|integer|exists:tenant.status,id",
     *          "signatures": "nullable|array",
     *          "signatures.*.sign_position": "required|string",
     *          "signatures.*.sign_person": "required|string",
     *          "signatures.*.sign_reference": "required|string",
     *          "signatures.*.status_id": "required|integer|exists:tenant.status,id",
     *          "signatures.*.collaborator_id": "required|integer|exists:tenant.collaborators,id",
     *          "signatures.*.position_id": "required|integer|exists:tenant.positions,id",
     *          "signatures.*.sign_reference": "required|string",
     *          "signatures.*.status_id": "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store(TypeReportRequest $request);

    /**
     * @OA\Get(
     *   path="/api/type-reports/{id}",
     *   tags={"Tipos de reportes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo de reporte",
     *   description="Muestra información específica de un tipo de reporte por Id.",
     *   operationId="getTypeReport",
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
     *     description="Id del tipo de instituto",
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
     *   path="/api/type-reports/{typeReport}",
     *   tags={"Tipos de reportes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar tipo de reporte",
     *   description="Actualizar un tipo de reporte.",
     *   operationId="updateTypeReport",
     *   @OA\Parameter(
     *     name="typeReport",
     *     description="Id del tipo de reporte",
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
     *           property="name",
     *           description="Nombre del tipo de reporte",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="acronym",
     *           description="Siglas del tipo de reporte",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="description",
     *           description="descripcion del tipo de reporte",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="rrhh",
     *           description="El recurso es de rrhh",
     *           type="boolean",
     *           example="0"
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de reporte",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "name": "required|string",
     *          "acronym": "nullable|string|max:5|unique:tenant.type_reports,acronym",
     *          "description": "nullable|string",
     *          "rrhh": "required|boolean",
     *          "status_id": "required|integer|exists:tenant.status,id",
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(TypeReportRequest $request, TypeReport $typeReport);

    /**
     * @OA\Delete(
     *   path="/api/type-reports/{typeReport}",
     *   tags={"Tipos de reportes"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un tipo de reporte",
     *   description="Eliminar un tipo de reporte por Id",
     *   operationId="deleteTypeReport",
     *   @OA\Parameter(
     *     name="typeReport",
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
    public function destroy(TypeReport $typeReport);
}
