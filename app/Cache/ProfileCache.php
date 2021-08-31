<?php

namespace App\Cache;

use App\Repositories\ProfileRepository;
use Illuminate\Database\Eloquent\Model;

class ProfileCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(ProfileRepository $profileRepository) {
        parent::__construct($profileRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($request) {
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
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($id) {
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
        $this->forgetCache('profiles');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('profiles');
        return $this->repository->destroy($model);
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function showUsers ($profile_id) {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($profile_id) {
            return $this->repository->showUsers($profile_id);
        });
    }
}
