<?php

namespace App\Cache;

use App\Models\Period;
use App\Repositories\PeriodRepository;
use Illuminate\Database\Eloquent\Model;

class PeriodCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(PeriodRepository $periodRepository) {
        parent::__construct($periodRepository);
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
        $this->forgetCache('periods');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('periods');
        return $this->repository->destroy($model);
    }

    /**
     * showOfferByPeriod
     *
     * @param  mixed $model
     * @return void
     */
    public function showOffersByPeriod (Model $model) {
        return $this->cache::remember($this->key, now()->addMinutes(env('TTL_CACHE')), function () use ($model) {
            return $this->repository->showOffersByPeriod($model);
        });
    }

    /**
     * destroyOffersByPeriod
     *
     * @param  mixed $model
     * @return void
     */
    public function destroyOffersByPeriod(Model $model) {
        $this->forgetCache('periods');
        return $this->repository->destroyOffersByPeriod($model);
    }

    /**
     * showHourhandsByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function showHourhandsByPeriod (Period $period) {
        return $this->cache::remember($this->key, now()->addMinutes(env('TTL_CACHE')), function () use ($period) {
            return $this->repository->showHourhandsByPeriod($period);
        });
    }

    /**
     * destroyHourhandsByPeriod
     *
     * @param  mixed $model
     * @return void
     */
    public function destroyHourhandsByPeriod(Model $model) {
        $this->forgetCache('periods');
        return $this->repository->destroyHourhandsByPeriod($model);
    }

}
