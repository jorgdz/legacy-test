<?php

namespace App\Cache;

use App\Repositories\CriteriaStudentRepository;
use Illuminate\Database\Eloquent\Model;

class CriteriaStudentRecordCache extends BaseCache
{

    /**
     * __construct
     *
     * @param  mixed $instituteTypeRepository
     * @return void
     */
    public function __construct(CriteriaStudentRepository $criteriaStudentRepository)
    {
        parent::__construct($criteriaStudentRepository);
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
        $this->forgetCache('criteria-students-records');
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

    /**
     * destroy
     *
     * @param  mixed $model
     * @return void
     */
    public function destroy (Model $model)
    {
        $this->forgetCache('criteria-students-records');
        return $this->repository->destroy($model);
    }
}
