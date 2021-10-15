<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Models\ExternalHomologation;
use App\Http\Requests\ExternalHomologationRequest;

interface IExternalHomologationController
{
    /**
     * @OA\Get(
     *   path="/api/external-homologations",
     *   tags={"Homologacion Externa"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las homologaciones externas",
     *   description="Muestra todas las homologaciones externas en formato JSON",
     *   operationId="getAllExternalHomologations",
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
     *   path="/api/external-homologations",
     *   tags={"Homologacion Externa"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear una homologacion externa",
     *   description="Crear una nueva homologacion externa.",
     *   operationId="addExternalHomologation",
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
     *           property="inst_subject_id",
     *           description="ID materia de la institucion (Externa)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_id",
     *           description="ID materia (Interna)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="relation_pct",
     *           description="porcentaje de relacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="comments",
     *           description="comentarios",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del paralelo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "inst_subject_id": "required|integer|exists:tenant.institution_subjects,id",
     *          "subject_id": "required|integer|exists:tenant.subjects,id",
     *          "relation_pct": "required|integer",
     *          "comments": "nullable|string|max:500",
     *          "status_id": "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */

    public function store(ExternalHomologationRequest $request);

    /**
     * @OA\Get(
     *   path="/api/external-homologations/{id}",
     *   tags={"Homologacion Externa"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener una homologacion externa",
     *   description="Muestra información específica de una homologacion external por Id.",
     *   operationId="getExternalHomologation",
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
     *     description="Id de la homologacion externa",
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
     *   path="/api/external-homologations/{externalHomologation}",
     *   tags={"Homologacion Externa"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar homologacion externa",
     *   description="Actualizar una homologacion externa.",
     *   operationId="updateExternalHomologation",
     *   @OA\Parameter(
     *     name="externalHomologation",
     *     description="Id de la homologacion externa",
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
     *           property="inst_subject_id",
     *           description="ID materia de la institucion (Externa)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="subject_id",
     *           description="ID materia (Interna)",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="relation_pct",
     *           description="porcentaje de relacion",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="comments",
     *           description="comentarios",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del paralelo",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "inst_subject_id": "required|integer|exists:tenant.institution_subjects,id",
     *          "subject_id": "required|integer|exists:tenant.subjects,id",
     *          "relation_pct": "required|integer",
     *          "comments": "nullable|string|max:500",
     *          "status_id": "required|integer|exists:tenant.status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(ExternalHomologationRequest $request, ExternalHomologation $externalHomologation);

    /**
     * @OA\Delete(
     *   path="/api/external-homologations/{externalHomologation}",
     *   tags={"Homologacion Externa"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una homologacion externa",
     *   description="Eliminar una homologacion externa por Id",
     *   operationId="deleteExternalHomologation",
     *   @OA\Parameter(
     *     name="externalHomologation",
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
    public function destroy(ExternalHomologation $externalHomologation);
}
