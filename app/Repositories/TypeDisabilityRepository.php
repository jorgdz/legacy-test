<?php

namespace App\Repositories;

use App\Models\TypeDisability;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeDisabilityRepository extends BaseRepository
{

    protected $relations = ['status', /* 'institutes', 'persons' */];
    protected $fields = ['typ_dis_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeDisability $typeDisability) {
        parent::__construct($typeDisability);
    }
}
