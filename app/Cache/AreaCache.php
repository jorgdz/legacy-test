<?php

namespace App\Cache;

use App\Repositories\AreaRepository;
use Illuminate\Database\Eloquent\Model;

class AreaCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(AreaRepository $areaRepository)
    {
        parent::__construct($areaRepository);
    }

    /**
     *
     *
     * @param  mixed $request
     * @return model
     */
    public function all($request)
    {
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
    public function find($id)
    {
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
    public function save(Model $model)
    {
        $this->forgetCache('areas');
        return $this->repository->save($model);
    }

    /**
     *
     *
     * @return void
     */
    public function destroy(Model $model)
    {
        $this->forgetCache('areas');
        return $this->repository->destroy($model);
    }
}
