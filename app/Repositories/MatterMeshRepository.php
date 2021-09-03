<?php

namespace App\Repositories;

use App\Models\MatterMesh;
use App\Repositories\Base\BaseRepository;

/**
 * MatterMeshRepository
 */
class MatterMeshRepository extends BaseRepository
{

    protected $relations = ['status','mesh','matter'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MatterMesh $matterMesh) {
        parent::__construct($matterMesh);
    }

}
