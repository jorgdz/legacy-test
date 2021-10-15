<?php

namespace App\Cache;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\ExternalHomologationRepository;

class ExternalHomologationCache extends BaseCache
{

    public function __construct(ExternalHomologationRepository $externalHomologationRepository)
    {
        parent::__construct($externalHomologationRepository);
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
    public function find($id)
    {
        return $this->cache::remember($this->key, $this->ttl, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    /**
     * findByConditionals
     *
     * @param  mixed $conditionals
     * @return void
     */
    public function findByConditionals($conditionals)
    {
        return $this->repository->findByConditionals($conditionals);
    }

    /**
     * save
     *
     * @param  mixed $model
     * @return void
     */
    public function save(Model $model)
    {
        $this->forgetCache('external-homologations');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @param  mixed $model
     * @return void
     */
    public function destroy(Model $model)
    {
        $this->forgetCache('external-homologations');
        return $this->repository->destroy($model);
    }
}
