<?php

namespace App\Cache;

use App\Repositories\UserProfileRepository;
use Illuminate\Database\Eloquent\Model;

class UserProfileCache extends BaseCache {

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(UserProfileRepository $userProfileRepository) {
        parent::__construct($userProfileRepository);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request) {
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
    public function save(Model $model) {
        $this->forgetCache('users');
        return $this->repository->save($model);
    }

    /**
     * destroy
     *
     * @return void
     */
    public function destroy (Model $model) {
        $this->forgetCache('users');
        return $this->repository->destroy($model);
    }

    /**
    * find the specified resource.
    *
    * @param array $conditionals
    * @return Illuminate\Database\Eloquent\Model
    * 
    */
    public function findByConditionals($conditionals) {
        return $this->repository->findByConditionals($conditionals);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param array $models
     * 
     */
    public function deleteModelHasRole($models) {
        return $this->repository->deleteModelHasRole($models);
    }
}
