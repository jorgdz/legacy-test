<?php

namespace App\Repositories;

use App\Models\MatterStatus;
use App\Repositories\Base\BaseRepository;

class MatterStatusRepository extends BaseRepository
{

    protected $relations = ['status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MatterStatus $matterStatus) {
        parent::__construct($matterStatus);
    }
}
