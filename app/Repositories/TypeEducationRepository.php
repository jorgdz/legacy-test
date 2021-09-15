<?php

namespace App\Repositories;

use App\Models\TypeEducation;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeEducationRepository extends BaseRepository
{

    protected $relations = ['status', /* 'institutes', 'persons' */];
    protected $fields = ['typ_edu_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeEducation $typeEducation) {
        parent::__construct($typeEducation);
    }
}
