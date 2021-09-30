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
    protected $relations = ['status', 'mesh', 'matter', 'simbology', 'matterMeshDependencies','calificationModel'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['matters', 'meshs', 'simbologies', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'can_homologate',
        'min_note',
        'min_calification',
        'max_calification',
        'matter_rename',
        'group',
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'can_homologate', 'min_note', 'min_calification', 'max_calification', 'matter_rename', 'group',
        'mat_name', 'cod_matter_migration', 'cod_old_migration', 'mat_translate', 'mat_acronym',
        'mes_name', 'mes_res_cas', 'mes_res_ocas', 'mes_cod_career', 'mes_title', 'mes_itinerary', 
        'mes_creation_date', 'mes_acronym', 'sim_description', 'st_name'
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

        return $query->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ? request()->query()['size'] : 100);
    }

    /**
     * findMatersbyMesh
     *
     * @param  mixed $mesh
     * @return subjects by id mesh
     */
    public function findMatersbyMesh($request, $id) {
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
        $page = isset(request()->query()['size']) ? request()->query()['size'] : 100;
        return $query->where("mesh_id", $id)->orderBy($sort, $type_sort)->paginate($page);
    }
        
    /**
     * setMatterMesh
     *
     * @param  mixed $id
     * @param  mixed $old
     * @param  mixed $new
     * @return void
     */
    public function setMatterMesh($id, $old, $new) {
        $order = MatterMesh::findOrFail($id);

        if ($new > $old) {
            MatterMesh::WhereBetween('order', [(int)$old, (int)$new])->decrement('order');
            $order->order = $new;

            return $order->save();
        }
        
        MatterMesh::WhereBetween('order', [(int)$new, (int)$old])->increment('order');
        $order->order = $new;

        return $order->save();
    }

    
    /**
     * showPrerequisites
     *
     * @param  mixed $matterMesh
     * @return void
     */
    public function showPrerequisites(MatterMesh $matterMesh) {
        $query = $matterMesh->matterMeshPrerequisites()->wherePivot('child_matter_mesh_id', $matterMesh->id)->with(['status', 'mesh', 'matter', 'simbology']);

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

        return $query->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ? request()->query()['size'] : 100);
    }
}
