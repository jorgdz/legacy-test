<?php

namespace App\Repositories;

use App\Models\StatusMarital;
use App\Repositories\Base\BaseRepository;

/**
 * StatusMaritalRepository
 */
class StatusMaritalRepository extends BaseRepository
{

    protected $relations = ['persons', 'status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (StatusMarital $statusMarital) {
        parent::__construct($statusMarital);
    }
}
