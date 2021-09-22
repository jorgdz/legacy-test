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

    /**
     * findMatersbyMesh
     *
     * @param  mixed $mesh
     * @return subjects by id mesh
     */
    public function findMatersbyMesh ($request,$id) {
        $query = $this->model;

        $query = $query->with([
            'matter',
            'matter.typeMatter',
            'matterMeshDependencies.matter',
        ]);

        $collection = $query->where("mesh_id",$id)->get();

        if(!is_null($request->get('page'))){
            $chunk = $collection->forPage($request->get('page'),is_null($request->get('size'))?10:$request->get('size'));
            $collection = $chunk->all();
        }

        if(!is_null($request->get('sort'))){
            if(is_null($request->get('type_sort')))
                $chunk = $collection->sortBy($request->get('sort'));
            else{
                if($request->get('type_sort')=='asc')
                    $chunk = $collection->sortBy($request->get('sort'));
                else
                    $chunk = $collection->sortByDesc($request->get('sort'));
            }
            $collection = $chunk->values()->all();
        }
        
        if(!is_null($request->get('search'))){
            $word=$request->get('search');
            $itemCollection = collect($collection);
            $filtered = $itemCollection->filter(function($item) use ($word) {
                $chr = array();
                foreach($this->fields as $field) {
                    $res = $item[$field] == $word;
                    if ($res !== false) $chr[$word] = $res;
                }
                if(empty($chr)) return false;
                return min($chr);
            });
            $collection = $filtered->all();
        }

        
        return $collection;
    }
}
