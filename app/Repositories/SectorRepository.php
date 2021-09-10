<?php

namespace App\Repositories;

use App\Models\Sector;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class SectorRepository extends BaseRepository
{

    protected $relations = ['status','persons'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Sector $sector) {
        parent::__construct($sector);
    }
}
