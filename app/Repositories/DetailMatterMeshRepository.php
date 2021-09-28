<?php

namespace App\Repositories;

use App\Models\DetailMatterMesh;
use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\MatterMesh;
use App\Models\Mesh;
use Carbon\Carbon;

/**
 * CampusRepository
 */
class DetailMatterMeshRepository extends BaseRepository
{
    protected $relations = ['matter_mesh','component','status'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (DetailMatterMesh $detailmattermesh) {
        parent::__construct($detailmattermesh);
    }

    public function checkIfExist($request){
        $data = DB::table('detail_matter_meshes')
                ->whereNotNull('deleted_at')
                ->where([['components_id', $request->components_id],['matter_mesh_id', $request->matter_mesh_id]])
                ->first();
        return $data;
    }

    public function getMeshIdByMatterMesh($matterMeshId){
        $matterMesh = MatterMesh::find($matterMeshId);
        $mesh_id    = $matterMesh->mesh()->first()->id;  
        return  $mesh_id;
    }

    public function deactivateComponentsByMesh($response)
    {
        $componentId = $response->component_id;
        return Mesh::where('id',$response->mesh_id)->with('matterMesh.detailMatterMesh', function ($query) use($componentId) {
            //$query->withTrashed()->where('components_id', '=', $componentId)->restore();
            $query->where('components_id', '=', $componentId)->update(array('deleted_at' => Carbon::now()));
        })->first();
    }

    public function activateComponentsByMesh($response)
    {
        $componentId = $response->component_id;
        return Mesh::where('id',$response->mesh_id)->with('matterMesh.detailMatterMesh', function ($query) use($componentId) {
            $query->withTrashed()->where('components_id', '=', $componentId)->restore();
        })->first();
    }
}
