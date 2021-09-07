<?php

namespace App\Cache;

use App\Repositories\InstituteTypeRepository;
use Illuminate\Database\Eloquent\Model;

class InstituteTypeCache extends BaseCache
{

    /**
     * __construct
     *
     * @param  mixed $instituteTypeRepository
     * @return void
     */
    public function __construct(InstituteTypeRepository $instituteTypeRepository)
    {
        parent::__construct($instituteTypeRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($request) {
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
        $this->forgetCache('institutetypes');
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
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($id) {
            return $this->repository->find($id);
        });
    }

    /**
     * destroy
     *
     * @param  mixed $model
     * @return void
     */
    public function destroy (Model $model)
    {
        $this->forgetCache('institutetypes');
        return $this->repository->destroy($model);
    }


}
