<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Models\Period;
use App\Cache\OfferCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Controllers\Api\Contracts\IOfferController;
use App\Traits\Auditor;

class OfferController extends Controller implements IOfferController
{
    //
    use RestResponse, Auditor;

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
            return $this->information(__('messages.nochange'));

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

    /**
     * showPeriodsbyoffer
     *
     * @param  mixed $request
     * @param  mixed $offer
     * @return void
     */
    public function showPeriodsByOffer (Offer $offer ) {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Offer::class)));
        return $this->success($this->offerCache->showPeriodsByOffer($offer));
    }

    /**
     * showPeriodbyoffer
     *
     * @param  mixed $request
     * @param  mixed $offer
     * @return void
     */
    public function showPeriodByOffer (Offer $offer, Period $period ) {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Offer::class)));
        return $this->success($this->offerCache->showPeriodByOffer($offer,$period));
    }

}
