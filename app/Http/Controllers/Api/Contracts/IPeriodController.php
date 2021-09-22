<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;

interface IPeriodController
{
    /**
     * @OA\Get(
     *   path="/api/periods",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las periodos",
     *   description="Muestra todos los periodos paginadas en formato JSON",
     *   operationId="getAllPeriods",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Perfil de usuario",
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
     *   path="/api/periods",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear periodo",
     *   description="Crear un nuevo periodo.",
     *   operationId="addPeriod",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="per_name",
     *           description="Nombre del periodo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="per_reference",
     *           description="Referencia del periodo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="per_min_matter_enrollment",
     *           description="Mínimo numero de materias a matricular",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="per_max_matter_enrollment",
     *           description="Máximo numero de materias a matricular",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="campus",
     *           description="Array de id de Sedes",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1,2,3]",
     *           uniqueItems=true
     *         ),
     *         @OA\Property(
     *           property="per_num_fees",
     *           description="Numero de cuotas de la matricula",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="per_fees",
     *           description="Valor total de la matricula",
     *           type="number",
     *           format="float",
     *         ),
     *         @OA\Property(
     *           property="per_pay_enrollment",
     *           description="Paga o no paga matricula",
     *           type="boolean",
     *         ),
     *         @OA\Property(
     *           property="type_period_id",
     *           description="Tipo de Periodo asociado",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="offers",
     *           description="Array de id de Ofertas",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1,2,3]",
     *           uniqueItems=true
     *         ),
     *         @OA\Property(
     *           property="hourhands",
     *           description="Array de id de Horarios",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1,2,3]",
     *           uniqueItems=true
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *        "per_name" : "required|string|unique:periods,per_name|max:255",
     *        "per_reference" : "required|string|unique:periods,per_reference|max:100",
     *        "per_min_matter_enrollment" : "required|integer",
     *        "per_max_matter_enrollment" : "required|integer",
     *        "campus" : "array",
     *        "campus.*" : "integer|exists:tenant.campus,id",
     *        "per_num_fees" : "nullable|integer",
     *        "per_fees" : "numeric|required_if:per_pay_enrollment,true|required_if:per_pay_enrollment,1",
     *        "type_period_id" : "required|integer|exists:type_periods,id",
     *        "status_id" : "required|integer|exists:status,id",
     *        "offers" : "array",
     *        "offers.*" : "integer|exists:offers,id|distinct",
     *        "hourhands" : "array",
     *        "hourhands.*" : "integer|exists:hourhands,id|distinct"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store (StorePeriodRequest $request);

    /**
     * @OA\Get(
     *   path="/api/periods/{period}",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener información de un periodo",
     *   description="Muestra información específica de un periodo.",
     *   operationId="showPeriod",
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
     *     name="period",
     *     description="Periodo",
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
     *   path="/api/periods/{period}/offers",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener ofertas académicas a partir del periodo",
     *   description="Muestra los ofertas académicas asociados a un periodo.",
     *   operationId="getPeriodOffer",
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
     *     name="period",
     *     description="Id del periodo",
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
    public function showOffersByPeriod (Period $period);

    /**
     * @OA\Get(
     *   path="/api/periods/{period}/hourhands",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener horarios a partir del periodo",
     *   description="Muestra los horarios asociados a un periodo.",
     *   operationId="getPeriodHourhand",
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
     *     name="period",
     *     description="Id del periodo",
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
    public function showHourhandsByPeriod (Period $period);

    /**
     * @OA\Put(
     *   path="/api/periods/{period}",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar información de un periodo",
     *   description="Actualizar información de un periodo.",
     *   operationId="updatePeriod",
     *   @OA\Parameter(
     *     name="period",
     *     description="Periodo",
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
     *           description="Perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="per_name",
     *           description="Nombre del periodo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="per_reference",
     *           description="Referencia del periodo",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="per_min_matter_enrollment",
     *           description="Mínimo numero de materias a matricular",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="per_max_matter_enrollment",
     *           description="Máximo numero de materias a matricular",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="per_num_fees",
     *           description="Numero de cuotas de la matricula",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="per_fees",
     *           description="Valor total de la matricula",
     *           type="number",
     *           format="float",
     *         ),
     *         @OA\Property(
     *           property="per_pay_enrollment",
     *           description="Paga o no paga matricula",
     *           type="boolean",
     *         ),
     *         @OA\Property(
     *           property="campus_id",
     *           description="Campus del periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="type_period_id",
     *           description="Tipo de Periodo asociado",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del periodo",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="offers",
     *           description="Array de id de Ofertas",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1,2,3]",
     *           uniqueItems=true
     *         ),
     *         @OA\Property(
     *           property="hourhands",
     *           description="Array de id de Horarios",
     *           type="array",
     *           @OA\Items(
     *              type="integer"
     *           ),
     *           example="[1,2,3]",
     *           uniqueItems=true
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *        "per_name" : "required|string|unique:periods,per_name,period->id|max:255",
     *       "per_reference" : "required|string|unique:periods,per_reference,period->id|max:100",
     *       "per_min_matter_enrollment" : "required|integer",
     *       "per_max_matter_enrollment" : "required|integer",
     *       "per_num_fees" : "nullable|integer",
     *       "per_fees" : "numeric|required_if:per_pay_enrollment,true|required_if:per_pay_enrollment,1",
     *       "per_pay_enrollment" : "required|boolean",
     *       "campus_id" : "required|integer|exists:campus,id",
     *       "type_period_id" : "required|integer|exists:type_periods,id",
     *       "status_id" : "required|integer|exists:status,id",
     *       "offers" : "array",
     *       "offers.*" : "integer|exists:offers,id|distinct",
     *       "hourhands" : "array",
     *       "hourhands.*" : "integer|exists:hourhands,id|distinct"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdatePeriodRequest $request, Period $period);

     /**
     * @OA\Delete(
     *   path="/api/periods/{period}",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un periodo",
     *   description="Eliminar un periodo por Id",
     *   operationId="deletePeriod",
     *   @OA\Parameter(
     *     name="period",
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
    public function destroy(Period $period);

    /**
     * @OA\Delete(
     *   path="/api/periods/{period}/offers",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar ofertas académicas a partir del periodo",
     *   description="Eliminar ofertas académicas a partir del periodo",
     *   operationId="deletePeriodOffer",
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
     *     name="period",
     *     in="path",
     *     description="Periodo",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
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
    public function destroyOffersByPeriod(Period $period);

    /**
     * @OA\Delete(
     *   path="/api/periods/{period}/hourhands",
     *   tags={"Periodos"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar horarios a partir del periodo",
     *   description="Eliminar horarios a partir del periodo",
     *   operationId="deletePeriodHourhand",
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
     *     name="period",
     *     in="path",
     *     description="Periodo",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
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
    public function destroyHourhandsByPeriod(Period $period);
}
