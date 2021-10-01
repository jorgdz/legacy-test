<?php

namespace App\Repositories;

use App\Models\CustomModules;
use App\Repositories\Base\BaseRepository;

class CustomModulesRepository extends BaseRepository
{
    protected $fields = ['name', 'group', 'status_id'];
    protected $relations = ['status'];

    protected $parents = ['status'];
    protected $selfFieldsAndParents = ['name', 'group', 'st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(CustomModules $customModules)
    {
        parent::__construct($customModules);
    }
}
