<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class UserRepository extends BaseRepository
{
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
        return $this->model->with(['userProfiles' => function($query) {
            $query->with('profile');
        }])->findOrFail($user_id);
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showProfilesById ( $user_id , $profile_id ) {
        return $this->model->with(['userProfiles' => function($query) use($profile_id) {
            $query->with('profile')->where('profile_id',$profile_id);
        }])->findOrFail($user_id);
    }
}
