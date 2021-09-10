<?php

namespace App\Repositories;

use App\Models\TypeDaytrip;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeDaytripRepository extends BaseRepository
{

    //protected $relations = ['institutes', 'status','persons'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeDaytrip $typeDaytrip) {
        parent::__construct($typeDaytrip);
    }
}
