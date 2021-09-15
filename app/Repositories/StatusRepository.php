<?php

namespace App\Repositories;

use App\Models\Status;
use App\Repositories\Base\BaseRepository;

class StatusRepository extends BaseRepository
{
    protected $fields = ['st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Status $status) {
        parent::__construct($status);
    }
}