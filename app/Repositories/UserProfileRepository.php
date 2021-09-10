<?php

namespace App\Repositories;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class UserProfileRepository extends BaseRepository
{
    protected $relations = ['user', 'profile'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (UserProfile $userProfile) {
        parent::__construct($userProfile);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $userProfile) {
        $userProfile->save();
        return $userProfile;
    }

    /**
     * find the specified resource.
     *
     * @param array $conditionals
     * @return Illuminate\Database\Eloquent\Model
     * 
     */
    public function findByConditionals($conditionals) {
        $query = $this->model;

        if (!empty($this->relations)) {
            $query = $query->with($this->relations);
        }

        return $query->where($conditionals)->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param array $models
     * 
     */
    public function deleteModelHasRole($models) {
        DB::connection('tenant')->table('model_has_roles')->whereIn('model_id', $models)->delete();
    }

    /**
     * 
     * 
     */
    public function validationUserProfile($conditionals, $permission) {
        return $this->model::where($conditionals)->with('roles.permissions')
            ->whereHas('roles.permissions', function ($query) use ($permission) {
                $query->where('name', $permission);
            })->first();
    }
}
