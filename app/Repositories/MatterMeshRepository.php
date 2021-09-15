<?php

namespace App\Repositories;

use App\Models\MatterMesh;
use App\Repositories\Base\BaseRepository;

/**
 * MatterMeshRepository
 */
class MatterMeshRepository extends BaseRepository
{

    protected $relations = ['status', 'mesh', 'matter'];
    protected $fields = ['calification_type', 'min_calification', 'num_fouls', 'matter_rename'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MatterMesh $matterMesh) {
        parent::__construct($matterMesh);
    }

}
