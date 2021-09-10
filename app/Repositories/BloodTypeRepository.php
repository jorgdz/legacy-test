<?php

namespace App\Repositories;

use App\Models\BloodType;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class BloodTypeRepository extends BaseRepository
{

    //protected $relations = ['institutes', 'status','persons'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (BloodType $bloodType) {
        parent::__construct($bloodType);
    }
}
