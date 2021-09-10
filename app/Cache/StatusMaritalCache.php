<?php

namespace App\Cache;

use App\Repositories\StatusMaritalRepository;
use Illuminate\Database\Eloquent\Model;

class StatusMaritalCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(StatusMaritalRepository $statusMaritalRepository) {
        parent::__construct($statusMaritalRepository);
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
        $this->forgetCache('statusmarital');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('statusmarital');
        return $this->repository->destroy($model);
    }
}