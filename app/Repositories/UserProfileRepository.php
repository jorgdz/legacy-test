<?php

namespace App\Repositories;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;
use App\Exceptions\Custom\ConflictException;

class UserProfileRepository extends BaseRepository
{
    protected $relations = ['user', 'profile'];

    protected $parents = ['user', 'profile', 'status'];

    protected $selfFieldsAndParents = ['us_username', 'email', 'pro_name', 'st_name'];

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
        $_userProfile = DB::connection('tenant')->table('user_profiles')
            ->select('id', 'user_id', 'profile_id', 'status_id')
            ->where('user_id', $userProfile->user_id)
            ->where('profile_id', $userProfile->profile_id)
            ->whereNotNull('deleted_at')->first();

        if ($_userProfile) {
            $this->model->withTrashed()
                ->find($_userProfile->id)->restore();
            return $_userProfile;
        }

        $userProfileExist = $this->model->where('user_id', $userProfile->user_id)
            ->where('profile_id', $userProfile->profile_id)->first();

        if($userProfileExist)
            throw new ConflictException(__('messages.exist-instance'));

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
            ->whereHas('roles', fn ($query) => $query->where('status_id', 1))
            ->whereHas('roles.permissions',
                fn ($query) => $query->where('name', $permission)->where('status_id', 1))
            ->first();
    }
}
