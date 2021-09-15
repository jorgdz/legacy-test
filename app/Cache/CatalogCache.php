<?php

namespace App\Cache;

use App\Repositories\CatalogRepository;
use Illuminate\Database\Eloquent\Model;

class CatalogCache extends BaseCache {

    /**
     * __construct
     *
     * @param App\Repositories\CatalogRepository $catalogRepository
     * @return void
     */
    public function __construct(CatalogRepository $catalogRepository) {
        parent::__construct($catalogRepository);
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
        $this->forgetCache('catalogs');
        return $this->repository->save($model);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Illuminate\Database\Eloquent\Model $model
     * @return Illuminate\Database\Eloquent\Model
     */
    public function destroy (Model $model) {
        /* $this->forgetCache('catalogs');
        return $this->repository->destroy($model); */
    }
}
