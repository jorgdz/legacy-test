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
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function showRolesbyUser ($user_id) {
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ($user_id) {
            return $this->repository->showRolesbyUser($user_id);
        });
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function showRolesbyUserProfile ( $user_id , $profile_id ) {
        //dd($user_id);
        return $this->cache::remember($this->key, now()->addMinutes(120), function () use ( $user_id , $profile_id ) {
            return $this->repository->showRolesbyUserProfile( $user_id , $profile_id );
        });
    }
}
