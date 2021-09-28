<?php

namespace App\Cache;

use App\Repositories\ComponentRepository;
use Illuminate\Database\Eloquent\Model;

class ComponentCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(ComponentRepository $componentRepository) {
        parent::__construct($componentRepository);
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
        $this->forgetCache('components');
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
        $this->forgetCache('components');
        return $this->repository->destroy($model);
    }

    public function checkIfExist($request){
        $this->forgetCache('components');
        return $this->repository->checkIfExist($request);
    }
}
