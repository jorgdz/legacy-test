<?php

namespace App\Repositories;

use App\Models\DetailSubjectCurriculum;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\SubjectCurriculum;
use App\Models\Curriculum;
use Carbon\Carbon;

/**
 * CampusRepository
 */
class DetailSubjectCurriculumRepository extends BaseRepository
{
    protected $relations = ['matter_mesh','component','status'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (DetailSubjectCurriculum $detailSubjectCurriculum) {
        parent::__construct($detailSubjectCurriculum);
    }

    public function checkIfExist($request){
        $data = DB::table('detail_subject_curriculum')
                ->whereNotNull('deleted_at')
                ->where([['components_id', $request->components_id],['matter_mesh_id', $request->matter_mesh_id]])
                ->first();
        return $data;
    }

    public function getMeshIdByMatterMesh($matterMeshId){
        $matterMesh = SubjectCurriculum::find($matterMeshId);
        $mesh_id    = $matterMesh->mesh()->first()->id;  
        return  $mesh_id;
    }

    public function deactivateComponentsByMesh($response)
    {
        $componentId = $response->component_id;
        return Curriculum::where('id',$response->mesh_id)->with('matterMesh.detailMatterMesh', function ($query) use($componentId) {
            //$query->withTrashed()->where('components_id', '=', $componentId)->restore();
            $query->where('components_id', '=', $componentId)->update(array('deleted_at' => Carbon::now()));
        })->first();
    }

    public function activateComponentsByMesh($response)
    {
        $componentId = $response->component_id;
        return Curriculum::where('id',$response->mesh_id)->with('matterMesh.detailMatterMesh', function ($query) use($componentId) {
            $query->withTrashed()->where('components_id', '=', $componentId)->restore();
        })->first();
    }
}
