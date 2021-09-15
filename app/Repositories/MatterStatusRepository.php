<?php

namespace App\Repositories;

use App\Models\MatterStatus;
use App\Repositories\Base\BaseRepository;

class MatterStatusRepository extends BaseRepository
{

    protected $relations = ['status'];
    protected $fields = ['name', 'type'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MatterStatus $matterStatus) {
        parent::__construct($matterStatus);
    }
}
