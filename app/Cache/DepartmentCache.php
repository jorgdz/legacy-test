<?php

namespace App\Cache;

use App\Repositories\DepartmentRepository;
use Illuminate\Database\Eloquent\Model;

class DepartmentCache extends BaseCache {

    /**
     * __construct
     *
     * @param App\Repositories\DepartmentRepository $departmentRepository
     * @return void
     */
    public function __construct(DepartmentRepository $departmentRepository) {
        parent::__construct($departmentRepository);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $request
     * @return Illuminate\Database\Eloquent\Model
     */
    public function all($request) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($request) {
            return $this->repository->all($request);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function find ($id) {
        return $this->cache::remember($this->key, $this->ttl, function () use ($id) {
            return $this->repository->find($id);
        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return Illuminate\Database\Eloquent\Model
     */
    public function save(Model $model) {
        $this->forgetCache('departments');
        return $this->repository->save($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return Illuminate\Database\Eloquent\Model
     */
    public function destroy (Model $model) {
        /* $this->forgetCache('departments');
        return $this->repository->destroy($model); */
    }

    /**
     * Display a listing of the resource.
     *
     * @return Illuminate\Database\Eloquent\Model
     */

    public function allWithoutParents() {
        return $this->cache::remember($this->key, $this->ttl, function () {
            return $this->repository->allWithoutParents();
        });
    }
}
