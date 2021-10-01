<?php

namespace App\Cache;

use App\Repositories\CurriculumRepository;
use Illuminate\Database\Eloquent\Model;

class CurriculumCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CurriculumRepository $curriculumRepository) {
        parent::__construct($curriculumRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request) {
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
    public function find($id) {
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
    public function save(Model $model) {
        $this->forgetCache('curriculums');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy(Model $model) {
        $this->forgetCache('curriculums');
        return $this->repository->destroy($model);
    }

    public function checkComponentInMeshsPublished($componentId)
    {
        return $this->repository->checkComponentInMeshsPublished($componentId);
    }

    public function checkMeshPublished($meshId)
    {
        return $this->repository->checkMeshPublished($meshId);
    }
}
