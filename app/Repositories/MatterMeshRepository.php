<?php

namespace App\Repositories;

use App\Models\MatterMesh;
use App\Repositories\Base\BaseRepository;

/**
 * MatterMeshRepository
 */
class MatterMeshRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'mesh', 'matter', 'matterMeshDependencies'];
    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['calification_type', 'min_calification','max_calification', 'num_fouls', 'matter_rename'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MatterMesh $matterMesh) {
        parent::__construct($matterMesh);
    }

    /**
     * showDependencies
     *
     * @param  mixed $matterMesh
     * @return void
     */
    public function showDependencies(MatterMesh $matterMesh) {
        return $matterMesh->matterMeshDependencies;
    }

}
