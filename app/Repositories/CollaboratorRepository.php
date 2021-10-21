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
