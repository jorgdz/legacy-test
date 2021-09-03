<?php

namespace App\Cache;

use App\Repositories\MatterMeshRepository;
use Illuminate\Database\Eloquent\Model;

class MatterMeshCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(MatterMeshRepository $matterMeshRepository) {
        parent::__construct($matterMeshRepository);
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
        $this->forgetCache('mattermesh');
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

    public function destroy (Model $model)
    {
        $this->forgetCache('mattermesh');
        return $this->repository->destroy($model);
    }


}
