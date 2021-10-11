<?php

namespace App\Repositories;

use App\Models\GroupArea;
use App\Repositories\Base\BaseRepository;

class GroupAreaRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['ga_name'];


    /**
     * __construct
     *
     * @return void
     */
    public function __construct (GroupArea $groupArea) {
        parent::__construct($groupArea);
    }
}
