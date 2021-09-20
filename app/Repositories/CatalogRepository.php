<?php

namespace App\Repositories;

use App\Models\Catalog;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Base\BaseRepository;

class CatalogRepository extends BaseRepository
{
    protected $relations = ['status', 'children'];
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
