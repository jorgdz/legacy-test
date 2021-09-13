<?php

namespace App\Cache;

use App\Models\Offer;
use App\Models\Period;
use App\Repositories\OfferRepository;
use Illuminate\Database\Eloquent\Model;

class OfferCache extends BaseCache {
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(OfferRepository $offerRepository) {
        parent::__construct($offerRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, $this->ttl, function () use ($request) {
            return $this->repository->all($request);
        });
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find ($id) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    /**
     * save
     *
     * @param  mixed $model
     * @return void
     */
    public function save(Model $model)
    {
        $this->forgetCache('offers');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('offers');
        return $this->repository->destroy($model);
    }

    /**
     * showPeriodsByOffer
     *
     * @param  mixed $id
     * @return void
     */
    public function showPeriodsByOffer (Offer $offer) {
        return $this->cache::remember($this->key, now()->addMinutes(env('TTL_CACHE')), function () use ($offer) {
            return $offer->periods;
        });
    }

    /**
     * showPeriodByOffer
     *
     * @param  mixed $id
     * @return void
     */
    public function showPeriodByOffer (Offer $offer, Period $period) {
        return $this->cache::remember($this->key, now()->addMinutes(env('TTL_CACHE')), function () use ($offer,$period) {
            return $this->repository->showPeriodByOffer($offer, $period);
        });
    }
}
