<?php

namespace App\Cache;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\StudentRecordPeriodRepository;

class StudentRecordPeriodCache extends BaseCache {
  
    /**
     * __construct
     *
     * @param  mixed $studentRecordPeriodRepository
     * @return void
     */
    public function __construct(StudentRecordPeriodRepository $studentRecordPeriodRepository) {
        parent::__construct($studentRecordPeriodRepository);
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
    public function save(Model $model) {
        $this->forgetCache('student-records-period');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @param  mixed $model
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('student-records-period');
        return $this->repository->destroy($model);
    }
}
