<?php

namespace App\Cache;

use App\Repositories\StatusRepository;
use Illuminate\Database\Eloquent\Model;

class StatusCache extends BaseCache {
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(StatusRepository $statusRepository) {
        parent::__construct($statusRepository);
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
        $this->forgetCache('status');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('status');
        return $this->repository->destroy($model);
    }
}