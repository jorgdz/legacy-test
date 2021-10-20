<?php

namespace App\Repositories;

use App\Models\AreaGroup;
use App\Models\GroupAreaSubject;
use App\Repositories\Base\BaseRepository;

class AreaGroupRepository extends BaseRepository
{
    protected $relations = ['status'];

    protected $fields = ['arg_name', 'arg_description'];

    protected $parents = ['status'];

    protected $selfFieldsAndParents = ['st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(AreaGroup $areaGroup) {
        parent::__construct($areaGroup);
    }
    
    /**
     * findSubjectsByGroup
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function findSubjectsByGroup ($request, $id) {
        $sort = $request->sort ?: 'id';
        $type_sort = $request->type_sort ?: 'desc';
        $search = $request->search ?: '';

        $groupAreaSubjects = GroupAreaSubject::with([
            'groupArea', 'subject', 'status', 'subject.educationLevel', 
            'subject.area', 'subject.typeMatter'
        ])
        ->where('group_nivelation_id', $id)
        ->whereHas('subject', function ($query) use ($search) {
                $query->where('mat_name', 'like', '%'. $search. '%')
                    ->orWhere('cod_matter_migration', 'like', '%'. $search. '%')
                    ->orWhere('cod_old_migration', 'like', '%'. $search. '%')
                    ->orWhere('mat_description', 'like', '%'. $search. '%')
                    ->orWhere('mat_translate', 'like', '%'. $search. '%');
            })
        ->orderBy($sort, $type_sort)->paginate($request->size ?: 100);

        return $groupAreaSubjects;
    }
}
