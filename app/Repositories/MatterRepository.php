<?php

namespace App\Repositories;

use App\Models\Matter;
use App\Repositories\Base\BaseRepository;

class MatterRepository extends BaseRepository
{
    protected $relations = ['status', 'typeMatter', 'typeCalification'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Matter $matter) {
        parent::__construct($matter);
    }
}
