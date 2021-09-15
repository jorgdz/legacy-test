<?php

namespace App\Repositories;

use App\Models\Parallel;
use App\Repositories\Base\BaseRepository;

class ParallelRepository extends BaseRepository {

    protected $relations = ['status'];
    protected $fields = ['par_name', 'par_acronym'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Parallel $parallel) {
        parent::__construct($parallel);
    }
}
