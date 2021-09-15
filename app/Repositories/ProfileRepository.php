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
     * save
     *
     * @return void
     */
    public function save (Model $profile) {
        $profile->save();
        return $profile;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showUsers ($profile_id) {
        return $this->model->with(['userProfiles' => function($query) use($profile_id) {
            $query->with('user')->where('profile_id',$profile_id);
        }])->findOrFail($profile_id);
    }
}
