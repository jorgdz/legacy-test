<?php

namespace App\Repositories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class ProfileRepository extends BaseRepository
{
    protected $relations = ['status'];
    protected $fields = ['pro_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Profile $profile) {
        parent::__construct($profile);
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showUsers (Profile $profile) {

        return $profile->with(['userProfiles', 'userProfiles.user'])->findOrFail($profile->id);

    }
}
