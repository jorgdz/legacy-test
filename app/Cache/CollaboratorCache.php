<?php

namespace App\Cache;

use App\Repositories\CollaboratorRepository;
use Illuminate\Database\Eloquent\Model;

class CollaboratorCache extends BaseCache
{

    public function __construct(CollaboratorRepository $collaboratorRepository)
    {
        parent::__construct($collaboratorRepository);
    }


    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, now()->addMinutes($this->ttl), function () use ($request) {
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
        return $this->cache::remember($this->key, now()->addMinutes($this->ttl), function () use ($id) {
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
        $this->forgetCache('collaborators');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('collaborators');
        return $this->repository->destroy($model);
    }

}