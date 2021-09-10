<?php

namespace App\Repositories;

use App\Models\TypeEducation;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeEducationRepository extends BaseRepository
{

    //protected $relations = ['institutes', 'status','persons'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeEducation $typeEducation) {
        parent::__construct($typeEducation);
    }
}
