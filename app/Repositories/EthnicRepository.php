<?php

namespace App\Repositories;

use App\Models\Ethnic;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class EthnicRepository extends BaseRepository
{

    protected $relations = ['status','persons'];
    protected $fields = ['eth_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Ethnic $ethnic) {
        parent::__construct($ethnic);
    }
}
