<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Offer;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\StoreOfferPeriodRequest;

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
     *   tags={"Periodos por oferta académica"},
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
    public function showPeriodsByOffer (Request $request, Offer $offer);

    /**
     * @OA\Get(
     *   path="/api/offers/{offer}/periods/{period}",
     *   tags={"Periodos por oferta académica"},
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
     *       example="5"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="period",
     *     description="Periodo",
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
    public function showPeriodByOffer (Request $request, Offer $offer, Period $period);

    /**
     * @OA\Post(
     *   path="/api/offers/{offer}/periods",
     *   tags={"Periodos por oferta académica"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Asigna un periodo a una oferta académica.",
     *   description="Asigna un periodo a una oferta académica.",
     *   operationId="addOfferPeriod",
     *   @OA\Parameter(
     *     name="offer",
     *     description="Oferta",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
     *           property="period_id",
     *           description="Periodo",
     *           type="integer",
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
    public function saveOfferPeriod (StoreOfferPeriodRequest $request, Offer $offer);
    
    /**
     * @OA\Put(
     *   path="/api/offers/{offer}/periods/{period}",
     *   tags={"Periodos por oferta académica"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Cambiar un periodo a una oferta académica y periodo previo.",
     *   description="Cambiar un periodo a una oferta académica y periodo previo.",
     *   operationId="updateOfferPeriod",
     *   @OA\Parameter(
     *     name="offer",
     *     description="Oferta",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     * @OA\Parameter(
     *     name="period",
     *     description="Periodo",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
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
     *           property="period_id",
     *           description="Periodo",
     *           type="integer",
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
    public function updateOfferPeriod (StoreOfferPeriodRequest $request, Offer $offer,Period $period);

    /**
     * @OA\Delete(
     *   path="/api/offers/{offer}/periods/{period}",
     *   tags={"Periodos por oferta académica"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un periodo por oferta académica",
     *   description="Eliminar un periodo por oferta académica",
     *   operationId="deleteOfferPeriod",
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
     *     in="path",
     *     description="Oferta",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="period",
     *     description="Periodo",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function destroyOfferPeriod(Request $request, Offer $offer,Period $period);

    /**
     * @OA\Delete(
     *   path="/api/offers/{offer}/periods",
     *   tags={"Periodos por oferta académica"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar una oferta académica",
     *   description="Eliminar una oferta académica por Id",
     *   operationId="deleteOfferPeriods",
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
     *     in="path",
     *     description="Oferta",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
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
    public function destroyOfferPeriods(Request $request, Offer $offer);
}
