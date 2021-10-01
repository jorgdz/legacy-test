<?php

namespace App\Repositories;

use App\Models\TypeDisability;
use App\Repositories\Base\BaseRepository;

/**
 * TypeDisabilityRepository
 */
class TypeDisabilityRepository extends BaseRepository
{

    protected $relations = ['status','persons'];
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
