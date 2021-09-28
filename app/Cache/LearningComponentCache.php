<?php

namespace App\Cache;

use App\Repositories\LearningComponentRepository;
use Illuminate\Database\Eloquent\Model;

class LearningComponentCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(LearningComponentRepository $learningComponentRepository) {
        parent::__construct($learningComponentRepository);
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
        $this->forgetCache('learning-components');
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
        $this->forgetCache('learning-components');
        return $this->repository->destroy($model);
    }

    public function calculateWorkLoad($mesh_id,$component_id)
    {
        $this->forgetCache('learning-components');
        return $this->repository->calculateWorkLoad($mesh_id,$component_id);
    }

    public function checkIfExist($component_id,$mesh_id){
        $this->forgetCache('learning-components');
        return $this->repository->checkIfExist($component_id,$mesh_id);
    }
    
    public function checkIfMeshComponentExist($component_id,$mesh_id){
        $this->forgetCache('learning-components');
        return $this->repository->checkIfMeshComponentExist($component_id,$mesh_id);
    }

    public function updateMeshWorkLoad($learningComponent){
        return $this->repository->updateMeshWorkLoad($learningComponent);
    }
}
