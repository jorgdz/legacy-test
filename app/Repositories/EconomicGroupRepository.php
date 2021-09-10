<?php

namespace App\Repositories;

use App\Models\EconomicGroup;
use App\Repositories\Base\BaseRepository;

class EconomicGroupRepository extends BaseRepository {

    protected $relations = [/* 'studentRecords',  */'status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (EconomicGroup $ecogro) {
        parent::__construct($ecogro);
    }
}
