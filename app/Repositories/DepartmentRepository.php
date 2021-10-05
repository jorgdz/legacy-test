<?php

namespace App\Repositories;


use App\Models\Department;
use App\Repositories\Base\BaseRepository;

class DepartmentRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'children', 'positions'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['dep_name'];

    /**
     * __construct
     *
     * @param App\Models\Department $department
     * @return void
     */
    public function __construct(Department $department)
    {
        parent::__construct($department);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {

       
 
     

        if (isset($request['data']) && ($request->search || $request->data)) {
         
            return ($request['data'] === 'all') ?  $this->data
                ->withOutPaginate($this->selected)
                ->withModelRelations($this->relations)
                ->filter($request, $this->fields, $this->model->getRelations(), $this->model->getKeyName(), $this->model->getTable())
                ->getCollection() : [];
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
