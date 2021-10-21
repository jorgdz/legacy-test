<?php

namespace App\Repositories;

use App\Models\EducationLevel;
use App\Models\Collaborator;
use App\Repositories\Base\BaseRepository;

/**
 * EducationLevelRepository
 */
class EducationLevelRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'status', 'offer', 'meshs', 'children'
    ];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['offers', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'edu_name',
        'edu_alias',
        'edu_order',
        'principal_id'
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'edu_name',
        'edu_alias',
        'edu_order',
        'off_name',
        'st_name',
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(EducationLevel $educationLevel)
    {
        parent::__construct($educationLevel);
    }


    /**
     * find information by conditionals
     *
     * @return model
     *
     */
    public function find($id)
    {
        $query = $this->model;

        if (!empty($this->relations)) {
            $query = $query->with(['status', 'offer', 'classroomEducationLevel', 'children', 'meshs' => function ($query) {
                $query->where('status_id', 7);
            }]);
        }

        return $query->findOrFail($id);
    }

    /**
     * setEducationLevel
     *
     * @param  mixed $conditions
     * @param  mixed $params
     * @return void
     */
    public function setEducationLevel($conditions, $params)
    {
        return EducationLevel::where($conditions)->update($params);
    }

        /**
     * Collaborator::where('education_level_principal_id', $educationlevel)->paginate()
     */

    public function getCollaboratorsPerEducationLvl($educationlevel,$request)
    {
        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';
        $search = isset(request()->query()['search']) ? request()->query()['search'] : '';
        
        $conditions = [
            ['education_level_principal_id', $educationlevel->id]
        ];

        if(isset($request->type_collaborator))
            array_push($conditions,['coll_type', $request->type_collaborator]);
  

        $response = Collaborator::with('user', 'user.person', 'educationLevelPrincipal', 'position', 'status', 'educationLevels', 'campus', 'course')
                    ->where($conditions)
                    ->Where(function($query) use ($search) {    
                        $query->orWhere('coll_activity', 'like', '%'. $search. '%')
                              ->orWhere('coll_email', 'like', '%'. $search. '%')
                              ->orWhere('coll_journey_description', 'like', '%'. $search. '%')
                              ->orWhere('coll_dependency', 'like', '%'. $search. '%')
                              ->orWhere('coll_advice', 'like', '%'. $search. '%')
                              ->orWhere('coll_journey_hours', 'like', '%'. $search. '%')
                              ->orWhere('coll_entering_date', 'like', '%'. $search. '%')
                              ->orWhere('coll_leaving_date', 'like', '%'. $search. '%')
                              ->orWhere('coll_membership_num', 'like', '%'. $search. '%')
                              ->orWhere('coll_contract_num', 'like', '%'. $search. '%')
                              ->orWhere('coll_has_nomination', 'like', '%'. $search. '%')
                              ->orWhere('coll_nomination_entering_date', 'like', '%'. $search. '%')
                              ->orWhere('coll_nomination_leaving_date', 'like', '%'. $search. '%')
                              ->orWhere('coll_disabled_reason', 'like', '%'. $search. '%');
                    });
                
        if(isset($request->data) && $request->data = 'all')
           return $response->orderBy($sort, $type_sort)->get();


        return $response->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ? request()->query()['size'] : 100);

    }
}
