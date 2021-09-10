<?php

namespace App\Repositories;

use App\Models\TypeDisability;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeDisabilityRepository extends BaseRepository
{

    //protected $relations = ['institutes', 'status','persons'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeDisability $typeDisability) {
        parent::__construct($typeDisability);
    }
}
