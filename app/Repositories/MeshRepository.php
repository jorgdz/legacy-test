<?php

namespace App\Repositories;

use App\Http\Resources\MatterMeshResource;
use App\Models\Mesh;
use App\Repositories\Base\BaseRepository;

/**
 * MeshRepository
 */
class MeshRepository extends BaseRepository
{

    protected $relations = [
        'educationLevel',
        'pensum',
        'status',
    ];

    protected $fields = [
        'mes_name',
        'mes_acronym',
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Mesh $mesh)
    {
        parent::__construct($mesh);
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return subjects by id mesh
     */
    public function find ($id) {
        $query = $this->model;

        $query = $query->with([
            'educationLevel',
            'educationLevel.offer',
            'pensum',
            'status',
            'matterMesh',
            'matterMesh.matter',
            'matterMesh.matter.typeMatter',
            'matterMesh.matterMeshDependencies.matter',
        ]);

        return new MatterMeshResource($query->findOrFail($id));
    }
}
