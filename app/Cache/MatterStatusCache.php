<?php

namespace App\Cache;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\MatterStatusRepository;

class MatterStatusCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(MatterStatusRepository $matterStatusRepository) {
        parent::__construct($matterStatusRepository);
    }

    /**
     *
     *
     * @param  mixed $request
     * @return model
     */
    public function all($request) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($request) {
            return $this->repository->all($request);
        });
    }

    /**
     *
     *
     * @param  mixed $id
     * @return model
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
     * @return model
     */
    public function save(Model $model) {
        $this->forgetCache('matter-status');
        return $this->repository->save($model);
    }

    /**
     *
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('matter-status');
        return $this->repository->destroy($model);
    }
}
