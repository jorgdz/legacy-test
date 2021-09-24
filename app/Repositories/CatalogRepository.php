<?php

namespace App\Repositories;

use App\Models\Catalog;
use App\Repositories\Base\BaseRepository;

class CatalogRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'children'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['cat_acronym'];

    /**
     * __construct
     *
     * @param App\Models\Catalog $catalog
     * @return void
     */
    public function __construct (Catalog $catalog) {
        parent::__construct($catalog);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all ($request) {
        if (isset($request['data']) && $request->search) {
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
            ->filter($request, $this->fields,
                $this->model->getRelations(),
                $this->model->getKeyName(),
                $this->model->getTable())
            ->paginated($request, $this->model->getTable());
    }
}
