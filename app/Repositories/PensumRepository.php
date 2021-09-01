<?php

namespace App\Repositories;

use App\Models\Pensum;
use App\Repositories\Base\BaseRepository;

class PensumRepository extends BaseRepository
{

    protected $relations = ['status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Pensum $pensum) {
        parent::__construct($pensum);
    }
}
