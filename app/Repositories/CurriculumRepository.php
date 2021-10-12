<?php

namespace App\Repositories;

use App\Models\Curriculum;
use App\Http\Resources\MatterMeshResource;
use App\Repositories\Base\BaseRepository;

/**
 * MeshRepository
 */
class CurriculumRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'modality',
        'typeCalification',
        'educationLevel',
        'status',
    ];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = [
        'catalogs',
        'type_califications',
        'education_levels',
        'status'
    ];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'mes_name',
        'mes_res_cas',
        'mes_res_ocas',
        'mes_cod_career',
        'mes_title',
        'mes_itinerary',
        'mes_creation_date',
        'mes_acronym',
        'anio',
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'mes_name', 'mes_res_cas', 'mes_res_ocas', 'mes_cod_career', 'mes_title', 'mes_itinerary', 'mes_creation_date', 
        'mes_acronym', 'anio', 'cat_name', 'cat_acronym', 'tc_name', 'edu_name', 'edu_alias', 'edu_order', 'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Curriculum $curriculum) {
        parent::__construct($curriculum);
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
            'modality',
            'educationLevel.offer',
            'status',
            'matterMesh',
            'learningComponent',
            'matterMesh.matter',
            'matterMesh.simbology',
            'matterMesh.matter.typeMatter',
            'matterMesh.matterMeshPrerequisites',
            'matterMesh.matterMeshPrerequisites.matter',
            'matterMesh.matterMeshDependencies',
            'matterMesh.matterMeshDependencies.matter',
            'matterMesh.detailMatterMesh.component',    
        ]);

        return new MatterMeshResource($query->findOrFail($id));
    }

    /**
     * findByConditionals
     *
     * @param  mixed $conditionals
     * @return void
     */
    public function findByConditionals($conditionals) {
        $query = $this->model->with(['matterMesh'])->where($conditionals)->first();
        return json_decode(json_encode($query), true);
    }

    /**
     * checkComponentInMeshsPublished
     *
     * @param  mixed $componentId
     * @return void
     */
    public function checkComponentInMeshsPublished($componentId) {
        return $this->model->where('status_id','=','7')
            ->whereHas('learningComponent', function ($query) use($componentId) {
                $query->where('component_id', '=', $componentId);
            })->first();
    }

    /**
     * checkMeshPublished
     *
     * @param  mixed $meshId
     * @return void
     */
    public function checkMeshPublished($meshId) {
        return Curriculum::where('id',$meshId)->where('status_id','7')->first();
    }
}
