<?php

namespace App\Repositories;

use App\Models\Ethnic;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class EthnicRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status','persons'];

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
    protected $fields = ['eth_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['eth_name', 'st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Ethnic $ethnic) {
        parent::__construct($ethnic);
    }
}
