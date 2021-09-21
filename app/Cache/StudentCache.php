<?php

namespace App\Cache;

use App\Repositories\StudentRepository;
use Illuminate\Database\Eloquent\Model;

class StudentCache extends BaseCache
{

    public function __construct(StudentRepository $studentRepository)
    {
        parent::__construct($studentRepository);
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
        $this->forgetCache('students');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('students');
        return $this->repository->destroy($model);
    }

}
