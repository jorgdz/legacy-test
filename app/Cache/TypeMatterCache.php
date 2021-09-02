<?php

namespace App\Cache;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\TypeMatterRepository;

class TypeMatterCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(TypeMatterRepository $typeMatterRepository) {
        parent::__construct($typeMatterRepository);
    }

    /**
     *
     *
     * @param  mixed $request
     * @return model
     */
    public function all($request) {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($request) {
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
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($id) {
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
        $this->forgetCache('type-matters');
        return $this->repository->save($model);
    }

    /**
     *
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('type-matters');
        return $this->repository->destroy($model);
    }
}