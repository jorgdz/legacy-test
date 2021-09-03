<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Cache\OfferCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IOfferController;

class OfferController extends Controller implements IOfferController
{
    //
    use RestResponse;
    
    /**
     * offerCache
     *
     * @var mixed
     */
    private $offerCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (OfferCache $offerCache) {
        $this->offerCache = $offerCache;
    }

    /**
     * index
     *
     * List all offers
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->offerCache->all($request));
    }

    /**
     * show
     *
     * Profile by :id
     * @param  mixed $offer
     * @return void
     */
    public function show (Request $request,$id) {
        return $this->success($this->offerCache->find($id));
    }

    /**
     * store
     *
     * Add new offer
     * @param  mixed $offer
     * @return void
     */
    public function store (StoreOfferRequest $request) {
        $offerRequest = $request->all();
        $offer = new Offer($offerRequest);
        return $this->success($this->offerCache->save($offer));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $offer
     * @return void
     */
    public function update (StoreOfferRequest $request, Offer $offer) {
        $offerRequest = $request->all();
        $offer->fill($offerRequest);
        if ($offer->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        return $this->success($this->offerCache->save($offer));
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer) {
        return $this->success($this->offerCache->destroy($offer));
    }
} 
