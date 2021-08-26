<?php

namespace App\Repositories;

use App\Models\Campus;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class CampusRepository extends BaseRepository
{

    protected $relations = ['company', 'status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Campus $campus) {
        parent::__construct($campus);
    }
}
