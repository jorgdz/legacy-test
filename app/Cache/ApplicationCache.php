<?php

namespace App\Cache;

use App\Repositories\ApplicationRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApplicationCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(ApplicationRepository $applicationRepository) {
        parent::__construct($applicationRepository);
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
        $this->forgetCache('application');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('application');
        return $this->repository->destroy($model);
    }

    public function getAllApplicationStatus ($role) {
        return $this->repository->getAllApplicationStatus($role);
        return $this->cache::remember($this->key, $this->ttl, function () use ($role) {
            return $this->repository->getAllApplicationStatus($role);
        });
    }

    public function showApplicationStatus ($code) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($code) {
            return $this->repository->showApplicationStatus($code);
        });
    }

    public function changeApplicationStatus (Request $request) {
        return $this->repository->changeApplicationStatus($request);
    }
}
