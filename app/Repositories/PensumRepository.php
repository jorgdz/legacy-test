<?php

namespace App\Repositories;

use App\Models\Pensum;
use App\Repositories\Base\BaseRepository;

class PensumRepository extends BaseRepository
{

    protected $relations = ['status'];
    protected $fields = ['pen_name', 'pen_acronym', 'anio'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Pensum $pensum) {
        parent::__construct($pensum);
    }
}
