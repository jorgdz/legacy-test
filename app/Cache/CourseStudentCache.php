<?php

namespace App\Cache;

use App\Repositories\CourseStudentRepository;
use Illuminate\Database\Eloquent\Model;

//class DetailMatterMeshCache extends BaseCache
class CourseStudentCache extends BaseCache
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CourseStudentRepository $courseStudentRepository) {
        parent::__construct($courseStudentRepository);
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
        $this->forgetCache('course-student');
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
        $this->forgetCache('course-student');
        return $this->repository->destroy($model);
    }
}
