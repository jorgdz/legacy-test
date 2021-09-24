<?php

namespace App\Repositories;

use App\Models\EconomicGroup;
use App\Repositories\Base\BaseRepository;

class EconomicGroupRepository extends BaseRepository {

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'studentRecords'];

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
    protected $fields = ['eco_gro_name'];

    protected $selfFieldsAndParents = ['eco_gro_name', 'st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (EconomicGroup $ecogro) {
        parent::__construct($ecogro);
    }
}
