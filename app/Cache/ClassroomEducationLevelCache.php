<?php

namespace App\Cache;

use App\Repositories\ClassroomEducationLevelRepository;
use Illuminate\Database\Eloquent\Model;

//class DetailMatterMeshCache extends BaseCache
class ClassroomEducationLevelCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(ClassroomEducationLevelRepository $classroomEducationLevelRepository) {
        parent::__construct($classroomEducationLevelRepository);
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
        $this->forgetCache('classroom-education-levels');
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
        $this->forgetCache('classroom-education-levels');
        return $this->repository->destroy($model);
    }

    public function saveMultiple($classrooms)
    {
        $this->forgetCache('classroom-education-levels');
        return $this->repository->saveMultiple($classrooms);
    }

    public function validateRegister($request)
    {
        $this->forgetCache('classroom-education-levels');
        return $this->repository->validateRegister($request);
    }
    
    public function changeStatus($id,$status)
    {
        $this->forgetCache('classroom-education-levels');
        return $this->repository->changeStatus($id,$status);
    }

    public function getClassroomAssigned($request)
    {
        $this->forgetCache('classroom-education-levels');
        return $this->repository->getClassroomAssigned($request);
    }
    

}
