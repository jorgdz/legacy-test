<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\Base\BaseRepository;

class ProfileRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'userProfiles'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['pro_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['pro_name', 'st_name'];

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
