<?php

namespace App\Cache;

use App\Repositories\DetailSubjectCurriculumRepository;
use Illuminate\Database\Eloquent\Model;

//class DetailMatterMeshCache extends BaseCache
class DetailSubjectCurriculumCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(DetailSubjectCurriculumRepository $detailSubjectCurriculumRepository) {
        parent::__construct($detailSubjectCurriculumRepository);
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
        $this->forgetCache('details-subject-curriculum');
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
        $this->forgetCache('details-subject-curriculum');
        return $this->repository->destroy($model);
    }

    public function checkIfExist($request){
        $this->forgetCache('details-subject-curriculum');
        return $this->repository->checkIfExist($request);
    }

    public function getMeshIdByMatterMesh($matterMeshId){
        $this->forgetCache('details-subject-curriculum');
        return $this->repository->getMeshIdByMatterMesh($matterMeshId);
    }

    public function deactivateComponentsByMesh($response){
        $this->forgetCache('details-subject-curriculum');
        return $this->repository->deactivateComponentsByMesh($response);
    }

    public function activateComponentsByMesh($response){
        $this->forgetCache('details-subject-curriculum');
        return $this->repository->activateComponentsByMesh($response);
    }
}
