<?php

namespace App\Repositories;

use App\Models\LearningComponent;
use App\Repositories\Base\BaseRepository;
use App\Models\SubjectCurriculum;
use Illuminate\Support\Facades\DB;

/**
 * CampusRepository
 */
class LearningComponentRepository extends BaseRepository
{
    protected $relations = ['mesh','component','status'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (LearningComponent $learningComponent) {
        parent::__construct($learningComponent);
    }

    public function calculateWorkLoad($mesh_id,$component_id)
    {
        $sum =  SubjectCurriculum::selectRaw('ISNULL(SUM(d.dem_workload),0) as total')
                ->where([
                    ['subject_curriculum.mesh_id',$mesh_id],
                    ['d.components_id',$component_id],
                ])->whereNull('subject_curriculum.deleted_at')->whereNull('d.deleted_at')->join('detail_subject_curriculum as d','subject_curriculum.id', '=', 'd.matter_mesh_id')
                ->first();
                
        return $sum->total;
    }

    public function checkIfExist($component_id,$mesh_id)
    {
        $data = DB::table('learning_components')                
                ->where([['component_id', $component_id],['mesh_id', $mesh_id]])
                ->whereNotNull('deleted_at')
                ->first();
        return $data;
    }

    public function checkIfMeshComponentExist($component_id,$mesh_id)
    {
        $data = DB::table('learning_components')                
                ->where([['component_id', $component_id],['mesh_id', $mesh_id]])
                ->whereNull('deleted_at')
                ->first();
        return $data;
    }

    public function updateMeshWorkLoad($learningComponent)
    {
        return  LearningComponent::where([
                                        ['mesh_id', $learningComponent['mesh_id']],
                                        ['component_id', $learningComponent['component_id']]
                                    ])->update(array('lea_workload' => $learningComponent['lea_workload']));
    }
}
