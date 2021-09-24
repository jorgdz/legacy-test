<?php

namespace App\Repositories;

use App\Models\Parallel;
use App\Repositories\Base\BaseRepository;

class ParallelRepository extends BaseRepository {

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['par_name', 'par_acronym'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['par_name', 'par_acronym', 'st_name'];


    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Parallel $parallel) {
        parent::__construct($parallel);
    }
}
