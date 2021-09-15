<?php

namespace App\Repositories;

use App\Models\TypeDaytrip;
use App\Repositories\Base\BaseRepository;

class TypeDaytripRepository extends BaseRepository
{

    protected $relations = ['status', /* 'institutes', 'persons' */];
    protected $fields = ['typ_day_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeDaytrip $typeDaytrip) {
        parent::__construct($typeDaytrip);
    }
}
