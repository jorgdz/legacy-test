<?php

namespace App\Repositories;

use App\Models\OfferPeriod;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;
use App\Exceptions\Custom\NotFoundException;
use App\Models\Offer;

class OfferPeriodRepository extends BaseRepository 
{

    protected $relations = ['status,periods,offers'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (OfferPeriod $offerPeriod) {
        parent::__construct($offerPeriod);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $offerPeriod) {
        $offerPeriod->save();
        return $offerPeriod;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showPeriodsByOffer ($offer) {
        $response = $this->model->with('periods')->where('offer_id',$offer['id'])->get();
        if($response->isEmpty())
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(OfferPeriod::class)]));
        return $response;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showPeriodByOffer ($offer,$period) {
        $response = $this->model->with('periods')->where([['offer_id',$offer['id']],['period_id',$period['id']]])->first();
        if($response==null)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(OfferPeriod::class)]));
        return $response;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showOffersByPeriod ($period) {
        return $this->model->with('offers')->where('period_id',$period['id'])->get();
    }

    /**
     * delete a information
     * @param array $condition
     *
     * @return model
     *
     */
    public function destroy (Model $model) {
        OfferPeriod::where([['offer_id', $model['offer_id']],['period_id',$model['period_id']]])->delete();//$model->delete();
        return $model;
    }
}