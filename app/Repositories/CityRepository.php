<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class CityRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'institutes', 'persons'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['cit_name', 'cit_acronym'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['cit_name', 'cit_acronym', 'st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (City $city) {
        parent::__construct($city);
    }
}
