<?php

namespace App\Http\Controllers\Api;

use App\Models\Offer;
use App\Models\Period;
use App\Cache\OfferCache;
use App\Models\OfferPeriod;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\OfferPeriodCache;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferRequest;
use App\Exceptions\Custom\NotFoundException;
use App\Http\Requests\StoreOfferPeriodRequest;
use App\Http\Requests\UpdateOfferPeriodRequest;
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
    private $offerCache,$offerPeriodCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (OfferCache $offerCache,OfferPeriodCache $offerPeriodCache) {
        $this->offerCache = $offerCache;
        $this->offerPeriodCache = $offerPeriodCache;
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
    public function showPeriodsByOffer ( Request $request,Offer $offer ) {
        return $this->success($this->offerPeriodCache->showPeriodsByOffer($offer));
    }

    /**
     * showPeriodbyoffer
     *
     * @param  mixed $request
     * @param  mixed $offer
     * @return void
     */
    public function showPeriodByOffer ( Request $request,Offer $offer, Period $period ) {
        return $this->success($this->offerPeriodCache->showPeriodByOffer($offer,$period));
    }

    /**
     * saveOfferPeriod
     *
     * Add new OfferPeriod
     * @param  mixed $offerPeriod
     * @return void
     */
    public function saveOfferPeriod (StoreOfferPeriodRequest $request, Offer $offer) {
        $offerPeriodRequest = array_merge(['offer_id' => $offer['id']],$request->all());
        $offerPeriod = new OfferPeriod($offerPeriodRequest);
        return $this->success($this->offerPeriodCache->save($offerPeriod));
    }

    /**
     * saveOfferPeriod
     *
     * Add new OfferPeriod
     * @param  mixed $offerPeriod
     * @return void
     */
    public function updateOfferPeriod (UpdateOfferPeriodRequest $request, Offer $offer,Period $period) {
        $offerPeriodRequest = array_merge(['offer_id' => $offer['id']],$request->all());
        $offerPeriod = OfferPeriod::where([['offer_id' , $offer['id']],['period_id' , $period['id']]])->first();

        $offerPeriod->fill($offerPeriodRequest);
        if ($offerPeriod->isClean())
            return $this->information(__('messages.nochange'));
        return $this->success($this->offerPeriodCache->update($offerPeriod));
    }

    /**
     * Remove
     *
     * @param  mixed  $offer, $period
     * @return \Illuminate\Http\Response
     */
    public function destroyOfferPeriod(Request $request, Offer $offer,Period $period) {
        $matchThese = [['offer_id','=',$offer->id],['period_id','=',$period->id]];
        $offerPeriod = OfferPeriod::where($matchThese)->first();
        return $this->success($this->offerPeriodCache->destroy($offerPeriod));
    }

    /**
     * Remove
     *
     * @param  mixed  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroyOfferPeriods(Request $request,Offer $offer) {
        $offerPeriods = OfferPeriod::where('offer_id',$offer->id)->get();
        if ($offerPeriods->isEmpty())
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(OfferPeriod::class)]));

        foreach ($offerPeriods as $offerPeriod) {
            $offerPeriod = $this->offerPeriodCache->destroy($offerPeriod);
        }
        return $this->success($offerPeriods);
    }
}
