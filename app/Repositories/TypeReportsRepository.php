<?php

namespace App\Repositories;

use App\Models\TypeReport;
use App\Repositories\Base\BaseRepository;

class TypeReportsRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['name', 'acronym'];

    /**
     * parents
     * Name of rable relationals
     * @var array
     */
    protected $parents = ['status'];

    /**
     * selfFieldsAndParents
     * Fields of table relationals
     * @var array
     */
    protected $selfFieldsAndParents = ['name', 'acronym', 'st_name'];

    /**
     * __construct
     *
     * @param  mixed $typeReport
     * @return void
     */
    public function __construct(TypeReport $typeReport)
    {
        parent::__construct($typeReport);
    }

    /**
     * find
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id)
    {
        $query = $this->model;
        $model = $this->model->find($id);

        $relations = ['otherSignatures'];
        if ($model->rrhh) {
            $relations = ['collaboratorSignatures', 'collaboratorSignatures.collaborator', 'collaboratorSignatures.position'];
        }

        $query = $query->with(array_merge($this->relations, $relations));

        return $query->findOrFail($id);
    }
}
