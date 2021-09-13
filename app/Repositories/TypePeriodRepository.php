<?php

namespace App\Repositories;

use App\Models\TypePeriod;
use App\Repositories\Base\BaseRepository;

class TypePeriodRepository extends BaseRepository
{
    protected $relations = ['status','periods'];

    protected $fields = ['tp_name','tp_description'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypePeriod $typePeriod) {
        parent::__construct($typePeriod);
    }
}
