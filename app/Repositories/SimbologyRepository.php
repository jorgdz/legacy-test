<?php

namespace App\Repositories;

use App\Models\Simbology;
use App\Repositories\Base\BaseRepository;

class SimbologyRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'offers', 'matterMesh'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['sim_description'];

    protected $selfFieldsAndParents = ['sim_description', 'st_name'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * __construct
     *
     * @param  mixed $simbology
     * @return void
     */
    public function __construct(Simbology $simbology)
    {
        parent::__construct($simbology);
    }
}
