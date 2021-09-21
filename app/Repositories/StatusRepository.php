<?php

namespace App\Repositories;

use App\Models\Status;
use App\Repositories\Base\BaseRepository;

class StatusRepository extends BaseRepository
{
    protected $fields = ['st_name'];

    protected $relations = ['categoryStatus'];

    protected $parents = ['category_status'];

    protected $selfFieldsAndParents = ['cat_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Status $status) {
        parent::__construct($status);
    }

    public function all ($request) {
        if ($request->search) {
            return $this->data
                ->withOutPaginate($this->selected)
                ->withModelRelations($this->relations)
                ->filter($request, $this->fields, $this->model->getRelations(), $this->model->getKeyName(), $this->model->getTable())
                ->getCollection();
        }

        return $this->data
            ->withModelRelations($this->relations)
            ->searchWithColumnNames($request)
            ->searchWithConditions($request)
            ->paginated($request, $this->model->getTable());
    }
}