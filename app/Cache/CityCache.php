<?php

namespace App\Cache;

use App\Repositories\CityRepository;
use Illuminate\Database\Eloquent\Model;

class CityCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CityRepository $cityRepository) {
        parent::__construct($cityRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, now()->addMinutes(env('TTL_CACHE')), function () use ($request) {
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
        return $this->cache::remember($this->key, now()->addMinutes(env('TTL_CACHE')), function () use ($id) {
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
        $this->forgetCache('cities');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('cities');
        return $this->repository->destroy($model);
    }
}