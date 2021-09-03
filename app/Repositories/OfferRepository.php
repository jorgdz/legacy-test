<?php

namespace App\Repositories;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class OfferRepository extends BaseRepository
{
    protected $relations = ['status'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Offer $offer) {
        parent::__construct($offer);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $offer) {
        $offer->save();
        return $offer;
    }
}