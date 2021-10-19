<?php

namespace App\Repositories;

use App\Models\Collaborator;
use App\Repositories\Base\BaseRepository;

class CollaboratorRepository extends BaseRepository
{
    protected $relations = ['user', 'user.person', 'educationLevelPrincipal', 'position', 'status', 'educationLevels', 'campus', 'course']; //,'offersEducationLevels'

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'coll_email', 'coll_activity',
    ];

    /**
     * __construct
     *
     * @param  mixed $collaborator
     * @return void
     */
    public function __construct(Collaborator $collaborator)
    {
        parent::__construct($collaborator);
    }

    /**
     * Collaborator::where('education_level_principal_id', $educationlevel)->paginate()
     */

    public function getCollaboratorsPerEducationLvl($educationlevel)
    {
        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';
        $search = isset(request()->query()['search']) ? request()->query()['search'] : '';

        return Collaborator::with($this->relations)
            ->where('education_level_principal_id', $educationlevel)
            ->where('coll_email', 'like', '%'. $search. '%')
            ->orWhere('coll_activity', 'like', '%'. $search. '%')
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
            ->orWhere('coll_disabled_reason', 'like', '%'. $search. '%')
            ->orderBy($sort, $type_sort)
            ->paginate(isset(request()->query()['size']) ? request()->query()['size'] : 100);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {

        //D (DOCENTE) A(ADMINISTRATIVO)
         $condition = ['conditions' => [
                ['coll_type',$request['coll_type'] ]
            ]
        ];
        if (isset($request['data'])) {
            return ($request['data'] === 'all') ?  $this->data
                //->withOutPaginate($this->selected)
                ->withModelRelations($this->relations)
                ->filter($request, $this->fields, $this->model->getRelations(), $this->model->getKeyName(), $this->model->getTable())
                ->getCollection() : [];
        }

        if(isset($request['coll_type'])){

           return  (in_array($request['coll_type'], ['A', 'D'])) ?
                $this->data
                ->withModelRelations($this->relations)
                ->searchWithColumnNames($request)
                ->searchWithConditions($condition)
                ->filter(
                    $request,
                    $this->fields,
                    $this->model->getRelations(),
                    $this->model->getKeyName(),
                    $this->model->getTable())
                ->paginated($request, $this->model->getTable()) : [] ;

        }

        return $this->data
            ->withModelRelations($this->relations)
            ->searchWithColumnNames($request)
            ->searchWithConditions($request)
            ->filter(
                $request,
                $this->fields,
                $this->model->getRelations(),
                $this->model->getKeyName(),
                $this->model->getTable()
            )
            ->paginated($request, $this->model->getTable());
    }
}
