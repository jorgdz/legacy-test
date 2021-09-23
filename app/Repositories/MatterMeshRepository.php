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
    protected $relations = ['status', 'mesh', 'matter', 'simbology', 'matterMeshDependencies'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'calification_type',
        'min_calification',
        'max_calification',
        'matter_rename',
        'group',
    ];

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
        $query = $matterMesh->matterMeshDependencies()->wherePivot('parent_matter_mesh_id', $matterMesh->id)->with(['status', 'mesh', 'matter', 'simbology']);

        $fields = [
            'calification_type',
            'min_calification',
            'max_calification',
            'matter_rename',
            'group',
        ];

        if (isset(request()->query()['search'])) {
            $query = $query->where(function ($query) use ($fields) {
                for($i = 0; $i < count($fields); $i ++) {
                    $query->orwhere($fields[$i], 'like',  '%' . strtolower(request()->query()['search']) .'%');
                }
            });
        }

        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';

        return $query->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ?: 100);
    }

    /**
     * findMatersbyMesh
     *
     * @param  mixed $mesh
     * @return subjects by id mesh
     */
    public function findMatersbyMesh ($request,$id) {
        $query = $this->model;
        $fields = $this->fields;
        $query = $query->with([
            'matter',
            'simbology',
            'matter.typeMatter',
            'matterMeshDependencies.matter',
        ]);

        if (isset(request()->query()['search'])) {
            $query = $query->where(function ($query) use ($fields) {
                for($i = 0; $i < count($fields); $i ++) {
                    $query->orwhere($fields[$i], 'like',  '%' . strtolower(request()->query()['search']) .'%');
                }
            });
        }

        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';

        return $query->where("mesh_id",$id)->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ?: 100);
    }
}
