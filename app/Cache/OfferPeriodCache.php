<?php

namespace App\Cache;

use App\Repositories\OfferPeriodRepository;
use Illuminate\Database\Eloquent\Model;

class OfferPeriodCache extends BaseCache {
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(OfferPeriodRepository $offerPeriodRepository) {
        parent::__construct($offerPeriodRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($request) {
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
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($id) {
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
        $this->forgetCache('offersPeriod');
        return $this->repository->save($model);
    }

    /**
     * update
     *
     * @param  mixed $model
     * @return void
     */
    public function update(Model $model)
    {
        $this->forgetCache('offersPeriod');
        return $this->repository->update($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('offersPeriod');
        return $this->repository->destroy($model);
    }

    /**
     * showPeriodsByOffer
     *
     * @param  mixed $id
     * @return void
     */
    public function showPeriodsByOffer ($offer) {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($offer) {
            return $this->repository->showPeriodsByOffer($offer);
        });
    }

    /**
     * showPeriodByOffer
     *
     * @param  mixed $id
     * @return void
     */
    public function showPeriodByOffer ($offer,$period) {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($offer,$period) {
            return $this->repository->showPeriodByOffer($offer,$period);
        });
    }

    /**
     * showOfferByPeriod
     *
     * @param  mixed $id
     * @return void
     */
    public function showOffersByPeriod ($period) {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($period) {
            return $this->repository->showOffersByPeriod($period);
        });
    }
}