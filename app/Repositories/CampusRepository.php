<?php

namespace App\Repositories;

use App\Models\Campus;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class CampusRepository extends BaseRepository
{

    protected $relations = ['company', 'status','periods'];
    protected $fields = ['cam_name', 'cam_description', 'cam_direction'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Campus $campus) {
        parent::__construct($campus);
    }
}
