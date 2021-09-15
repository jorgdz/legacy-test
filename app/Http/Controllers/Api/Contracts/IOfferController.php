<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Offer;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOfferRequest;

interface IOfferController
{
    /**
     * @OA\Get(
     *   path="/api/offers",
     *   tags={"Ofertas Académicas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar las ofertas académicas",
     *   description="Muestra todas las ofertas académicas paginadas en formato JSON",
     *   operationId="getAllOffers",
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
     *   path="/api/offers",
     *   tags={"Ofertas Académicas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear oferta académica",
     *   description="Crear una nueva oferta académica.",
     *   operationId="addOffer",
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
     *           property="off_name",
     *           description="Nombre de la oferta",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="off_description",
     *           description="Descripcion de la oferta",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la oferta",
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
    public function store (StoreOfferRequest $request);

    /**
     * @OA\Get(
     *   path="/api/offers/{offer}",
     *   tags={"Ofertas Académicas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener información de una oferta académica",
     *   description="Muestra información específica de una oferta académica.",
     *   operationId="showOffer",
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
     *     name="offer",
     *     description="Id de la oferta",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
    public function show(Request $request,Offer $offer);

    /**
     * @OA\Put(
     *   path="/api/offers/{offer}",
     *   tags={"Ofertas Académicas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar información de una oferta académica",
     *   description="Actualizar información de una oferta académica.",
     *   operationId="updateOffer",
     *   @OA\Parameter(
     *     name="offer",
     *     description="Id de la oferta",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
     *           property="off_name",
     *           description="Nombre de la oferta",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="off_description",
     *           description="Descripcion de la oferta",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado de la oferta",
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
    public function update(StoreOfferRequest $request, Offer $offer);

     /**
     * @OA\Delete(
     *   path="/api/offers/{offer}",
     *   tags={"Ofertas Académicas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una oferta académica",
     *   description="Eliminar una oferta académica por Id",
     *   operationId="deleteOffer",
     *   @OA\Parameter(
     *     name="offer",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function destroy(Offer $offer);

    /**
     * @OA\Get(
     *   path="/api/offers/{offer}/periods",
     *   tags={"Ofertas Académicas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener periodos a partir de oferta académica",
     *   description="Muestra los periodos asociados a la oferta académica.",
     *   operationId="getPeriodsByOffer",
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
     *     name="offer",
     *     description="Oferta",
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
    public function showPeriodsByOffer (Offer $offer);

    /**
     * @OA\Get(
     *   path="/api/offers/{offer}/periods/{period}",
     *   tags={"Ofertas Académicas"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener periodo a partir de oferta académica",
     *   description="Muestra el periodo asociado a la oferta académica.",
     *   operationId="getPeriodByOffer",
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
     *     name="offer",
     *     description="Oferta",
     *     in="path",
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
    public function showPeriodByOffer (Offer $offer, Period $period);
}
