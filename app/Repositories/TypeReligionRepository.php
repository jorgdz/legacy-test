<?php

namespace App\Repositories;

use App\Models\TypeReligion;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeReligionRepository extends BaseRepository
{

    protected $relations = ['status','persons'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeReligion $typeReligion) {
        parent::__construct($typeReligion);
    }
}
