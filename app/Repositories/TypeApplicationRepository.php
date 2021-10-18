<?php

namespace App\Repositories;

use App\Models\Application;
use App\Models\TypeApplication;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeApplicationRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['children', 'configTypeApplication', 'typeApplicationStatus', 'status'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['children', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['typ_app_name', 'typ_app_description', 'typ_app_acronym'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'app_code',
        'app_name',
        'typ_app_name',
        'typ_app_description'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(TypeApplication $typeapplication)
    {
        parent::__construct($typeapplication);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
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
            ->filter(
                $request,
                $this->fields,
                $this->model->getRelations(),
                $this->model->getKeyName(),
                $this->model->getTable()
            )
            ->paginated($request, $this->model->getTable());
    }

    /**
     * findByConditionals
     *
     * @param  mixed $conditionals
     * @return \Illuminate\Http\Response
     */
    public function findByConditionals($conditionals)
    {
        $query = $this->model->where($conditionals)->with(['configTypeApplication' => function ($query) {
            $query->where('status_id', 1);
        }])->first();
        return $query;
    }
}
