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

}
