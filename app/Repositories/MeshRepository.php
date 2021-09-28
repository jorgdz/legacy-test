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

    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'educationLevel',
        // 'pensum',
        'status',
    ];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = [
        // 'pensums', 
        'education_levels',
         'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'mes_name',
        'mes_acronym',
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'mes_name',
        'mes_acronym',
        // 'pen_name', 'pen_acronym', 'anio',
        'edu_name', 'edu_alias', 'edu_order',
        'st_name'
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
            // 'pensum',
            'status',
            'matterMesh',
            'learningComponent',
            'matterMesh.matter',
            'matterMesh.matter.typeMatter',
            'matterMesh.matterMeshDependencies.matter',
            'matterMesh.detailMatterMesh.component',    
        ]);

        return new MatterMeshResource($query->findOrFail($id));
    }

    public function checkComponentInMeshsPublished($componentId)
    {
        return $this->model->where('status_id','=','7')
                            ->whereHas('learningComponent', function ($query) use($componentId) {
                                $query->where('component_id', '=', $componentId);
                            })->first();

    }

    public function checkMeshPublished($meshId)
    {
        return Mesh::where('id',$meshId)->where('status_id','7')->first();
    }
}
