<?php

namespace App\Repositories;

use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;
use App\Exceptions\Custom\NotFoundException;

class UserProfileRepository extends BaseRepository
{
    protected $relations = ['users', 'profiles'];
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
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showRolesbyUser ($user_id) {
        $query = $this->model->with('roles.permissions')->where('user_id',$user_id)->First();
        if ($query == null) 
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Role::class)]));

        $query->roles->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        $query->roles[0]->permissions->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        //unset($array2['pivot']['created_at']);
        return $query->roles;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showRolesbyUserProfile ( $user_id , $profile_id ) {
        $query = $this->model->with('roles.permissions')->where([['user_id',$user_id],['profile_id',$profile_id]])->first();
        if ($query == null) 
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Role::class)]));

        $query->roles->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        $query->roles[0]->permissions->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        //unset($array2['pivot']['created_at']);
        return $query->roles[0];
    }
}
