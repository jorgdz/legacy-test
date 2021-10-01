<?php

namespace App\Cache;

use App\Repositories\CustomStatusRepository;
use Illuminate\Database\Eloquent\Model;

class CustomStatusCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CustomStatusRepository $statusRepository)
    {
        parent::__construct($statusRepository);
    }

    /**
     *
     *
     * @param  mixed $request
     * @return model
     */
    public function all($request)
    {
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
    public function find($id)
    {
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
    public function save(Model $model)
    {
        $this->forgetCache('custom-status');
        return $this->repository->save($model);
    }

    /**
     *
     *
     * @return void
     */
    public function destroy(Model $model)
    {
        $this->forgetCache('custom-status');
        return $this->repository->destroy($model);
    }
}
