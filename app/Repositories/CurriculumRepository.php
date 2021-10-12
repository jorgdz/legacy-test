<?php

namespace App\Repositories;

use App\Models\Curriculum;
use App\Http\Resources\MatterMeshResource;
use App\Models\Component;
use App\Models\Subject;
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
     * @param  mixed $component
     * @return void
     */
    public function checkComponentInMeshsPublished(Component $component) {
        return $this->model->where('status_id', 7)
            ->whereHas('learningComponent', function ($query) use($component) {
                $query->where('component_id', '=', $component->id);
            })->first();
    }

    /**
     * checkMeshPublished
     *
     * @param  mixed $meshId
     * @return void
     */
    public function checkMeshPublished(Curriculum $curriculum) {
        return $curriculum->where('status_id', 7)->first();
    }

    /**
     * learningComponentByMesh
     *
     * @param  mixed $curriculum
     * @return void
     */
    public function learningComponentByMesh(Curriculum $curriculum)
    {
        $query = $curriculum->learningComponent()->with('component');
        return $query->paginate(isset(request()->query()['size']) ? request()->query()['size'] : 100);
    }
}
