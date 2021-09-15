<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class CityRepository extends BaseRepository
{

    protected $relations = ['institutes', 'status', 'persons'];
    protected $fields = ['cit_name', 'cit_acronym'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (City $city) {
        parent::__construct($city);
    }
}
