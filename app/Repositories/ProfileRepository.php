<?php

namespace App\Repositories;

use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class ProfileRepository extends BaseRepository
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Profile $profile) {
        parent::__construct($profile);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $profile) {
        $profile->save();
        return $profile;
    }
}
