<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\TypeEducation;
use Illuminate\Http\Request;

interface ITypeEducationController
{

    /**
     * @OA\Get(
     *   path="/api/type-educations",
     *   tags={"Tipo de Educación"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los tipos de Educación",
     *   description="Muestra todas los tipos de Educación en formato JSON",
     *   operationId="getAllTypeEducation",
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
   


    public function store(Request $request);
    

  /**
     * @OA\Get(
     *   path="/api/type-educations/{id}",
     *   tags={"Tipo de Educación"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un tipo de Educación",
     *   description="Muestra información específica de un tipo Educación por Id.",
     *   operationId="getTypeEducation",
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
     *     description="Id del tipo de Educación",
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
    


    public function update(Request $request, TypeEducation $typeEducation);
    


    public function destroy(TypeEducation $typeEducation);
    
}