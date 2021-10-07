<?php

namespace App\Cache;

use App\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\Model;

//class DetailMatterMeshCache extends BaseCache
class CourseCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CourseRepository $courseRepository) {
        parent::__construct($courseRepository);
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
        $this->forgetCache('courses');
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
        $this->forgetCache('courses');
        return $this->repository->destroy($model);
    }

    public function changeStatus($id,$status)
    {
        $this->forgetCache('courses');
        return $this->repository->changeStatus($id,$status);
    }

    
    public function validateCourseUnique($request,$courseId = null)
    {
        $this->forgetCache('courses');
        return $this->repository->validateCourseUnique($request,$courseId);
    }

    public function getCollaboratorsInCourse($request)
    {
        $this->forgetCache('courses');
        return $this->repository->getCollaboratorsInCourse($request);
    }

    public function saveMultiple($courses)
    {
        $this->forgetCache('courses');
        return $this->repository->saveMultiple($courses);
    }

    public function classroomHasCourses($classroomId)
    {
        $this->forgetCache('courses');
        return $this->repository->classroomHasCourses($classroomId);
    }
}
