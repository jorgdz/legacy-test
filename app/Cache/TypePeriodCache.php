<?php

namespace App\Cache;

use App\Repositories\TypePeriodRepository;
use Illuminate\Database\Eloquent\Model;

class TypePeriodCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(TypePeriodRepository $typePeriodRepository) {
        parent::__construct($typePeriodRepository);
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
        $this->forgetCache('type-periods');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('type-periods');
        return $this->repository->destroy($model);
    }
}
