<?php

namespace App\Repositories;

use App\Models\TypeEducation;
use App\Repositories\Base\BaseRepository;

/**
 * TypeEducationRepository
 */
class TypeEducationRepository extends BaseRepository
{

    protected $relations = ['status'];
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
