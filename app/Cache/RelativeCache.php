<?php

namespace App\Cache;

use App\Repositories\RelativeRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class RelativeCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(RelativeRepository $relativeRepository) {
        parent::__construct($relativeRepository);
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
     * save
     *
     * @param  mixed $model
     * @return void
     */
    public function save(Model $model)
    {
        $this->forgetCache('relatives');
        return $this->repository->save($model);
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id)
    {
        return $this->cache::remember($this->key, $this->ttl, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    public function destroy (Model $model)
    {
        $this->forgetCache('relatives');
        return $this->repository->destroy($model);
    }
}
