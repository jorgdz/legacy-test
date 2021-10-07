<?php

namespace App\Cache;

use App\Repositories\InstituteRepository;
use Illuminate\Database\Eloquent\Model;

class InstituteCache extends BaseCache
{
    /**
     * __construct
     *
     * @param  mixed $instituteTypeRepository
     * @return void
     */
    public function __construct(InstituteRepository $instituteRepository)
    {
        parent::__construct($instituteRepository);
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
        $this->forgetCache('institutes');
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

    /**
     * destroy
     *
     * @param  mixed $model
     * @return void
     */
    public function destroy(Model $model)
    {
        $this->forgetCache('institutes');
        return $this->repository->destroy($model);
    }

    /**
     * findByConditionals
     *
     * @param  mixed $conditionals
     * @return void
     */
    public function findByConditionals($conditionals)
    {
        return $this->cache::remember($this->key, $this->ttl, function () use ($conditionals) {
            return $this->repository->findByConditionals($conditionals);
        });
    }
}
