<?php

namespace App\Repositories;

use App\Models\Mesh;
use App\Repositories\Base\BaseRepository;

/**
 * MeshRepository
 */
class MeshRepository extends BaseRepository
{

    protected $relations = [
        //'educationLevel',
        'pensum',
        'status'
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
}
