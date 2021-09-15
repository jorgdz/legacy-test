<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Http\Requests\EducationLevelFormRequest;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use App\Http\Requests\MeshRequest;
use App\Http\Requests\ShowByUserProfileIdRequest;
use App\Http\Requests\TypeDocumentFormRequest;
use App\Models\TypeDocument;

interface ITypeDocumentController
{

    /**
     * @OA\Get(
     *   path="/api/type-document",
     *   tags={"Tipo de Documentos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de documentos",
     *   description="Muestra todas los tipos de documentos en formato JSON",
     *   operationId="getAllTypeDocuments",
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
     *   path="/api/type-document",
     *   tags={"Tipo de Documentos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear tipo de documento",
     *   description="Crear nuevo Tipo documento.",
     *   operationId="addTypeDocument",
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
     *           property="typ_doc_name",
     *           description="Nombre del tipo documento",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_doc_description",
     *           description="Descripcion de tipo documento",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la malla",
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
    public function store(TypeDocumentFormRequest $educationLevelFormRequest);


    /**
     * @OA\Get(
     *   path="/api/type-document/{id}",
     *   tags={"Tipo de Documentos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo de documento",
     *   description="Muestra información específica de un tipo de documento.",
     *   operationId="getIdTypeDocument",
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
     *     description="Id del tipo de documento",
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
     *   path="/api/type-document/{typeDocument}",
     *   tags={"Tipo de Documentos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar tipo documento",
     *   description="Actualizar un tipo de documento.",
     *   operationId="updateTypeDocument",
     *   @OA\Parameter(
     *     name="typeDocument",
     *     description="Id del tipo de documento",
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
     *           property="typ_doc_name",
     *           description="Nombre del tipo de documento",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="typ_doc_description",
     *           description="Descripcion del tipo de documento",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del tipo de calificación",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(TypeDocumentFormRequest $request, TypeDocument $typeDocument);


    /**
     * @OA\Delete(
     *   path="/api/type-document/{typeDocument}",
     *   tags={"Tipo de Documentos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un tipo de documento",
     *   description="Eliminar un tipo de documento por Id",
     *   operationId="deleteTypeDocument",
     *   @OA\Parameter(
     *     name="typeDocument",
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
    public function destroy(TypeDocument $typeDocument);
}
