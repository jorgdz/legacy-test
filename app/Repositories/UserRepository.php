<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;
use App\Exceptions\Custom\NotFoundException;
use Spatie\Permission\Exceptions\RoleDoesNotExist;

class UserRepository extends BaseRepository
{
    use RestResponse;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (User $user) {
        parent::__construct($user);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $user) {
        $user->password = Hash::make($user->password);
        $user->save();
        return $user;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showProfiles ($user_id) {
        $response = $this->model->with(['userProfiles' => function($query) {
            $query->with('profile');
        }])->find($user_id);
        if($response == null)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));
        if($response->userProfiles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Profile::class)]));
        return $response->userProfiles;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showProfilesById ( $user_id , $profile_id ) {
        $response = $this->model->with(['userProfiles' => function($query) use($profile_id) {
            $query->with('profile')->where('profile_id',$profile_id);
        }])->find($user_id);
        if($response == null)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));
        if($response->userProfiles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Profile::class)]));
        return $response->userProfiles[0];
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showRolesbyUser ($user_id) {
        $query = $this->model->with(['userProfiles' => function($query) {
            $query->with('roles.permissions');
        }])->find($user_id);
        if ($query == null) 
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));

        $query->userProfiles[0]->roles->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        $query->userProfiles[0]->roles[0]->permissions->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        //unset($array2['pivot']['created_at']);
        return $query->userProfiles;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showRolesbyUserProfile ( $user_id , $profile_id ) {
        $query = $this->model->with(['userProfiles' => function($query) use ($profile_id) {
            $query->with('roles.permissions')->where('profile_id',$profile_id);
        }])->find($user_id);
        if ($query == null) 
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));

        $query->userProfiles[0]->roles->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        $query->userProfiles[0]->roles[0]->permissions->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        return $query->userProfiles[0];
    }

    /**
     * saveRole
     *
     * @return void
     */
    public function saveRolesbyUserProfile ($array_roles,$userProfile) {
        $userProfile->syncRoles($array_roles);
        return $array_roles;
    }
}
