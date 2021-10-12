<?php

namespace App\Cache;

use App\Models\ClassRoom;
use App\Repositories\CampusRepository;
use Illuminate\Database\Eloquent\Model;

class CampusCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CampusRepository $campusRepository) {
        parent::__construct($campusRepository);
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
    public function save(Model $model)
    {
        $this->forgetCache('campus');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('campus');
        return $this->repository->destroy($model);
    }



    
    public function getClassromsByCampusCache ($campus) {
        return $this->cache::remember($this->key, now()->addMinutes($this->ttl), function () use ($campus) {
             return ClassRoom::where('campus_id', $campus->id)->paginate();
            //return $this->repository->all($campus);
        });
    }


}
