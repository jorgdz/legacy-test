<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Models\Period;
use App\Repositories\Base\BaseRepository;

class OfferRepository extends BaseRepository
{
    protected $relations = ['status','periods','educationLevels'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Offer $offer) {
        parent::__construct($offer);
    }

    public function showPeriodByOffer (Offer $offer, Period $period) {
        $periodFound = $offer->periods()->wherePivot('period_id', $period->id)->first();
        return $periodFound;
    }
}
