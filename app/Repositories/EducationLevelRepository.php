<?php

namespace App\Repositories;

use App\Models\EducationLevel;
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
        'status','offer', 'meshs', 'children'
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
    public function __construct(EducationLevel $educationLevel) {
        parent::__construct($educationLevel);
    }

    // /**
    //  * get all information
    //  *
    //  * @return model
    //  *
    //  */
    // public function all ($request) {
    //     if (isset($request['data']))
    //         return ($request['data'] === 'all') ? $this->data->withOutPaginate($this->selected)->getCollection() : [];

    //     return $this->data
    //         ->withModelRelations(['status', 'offer', 'meshs' => function($query) {
    //             $query->where('status_id', 7);
    //         }])
    //         ->searchWithColumnNames($request)
    //         ->searchWithConditions($request)
    //         ->filter($request, $this->fields,
    //             $this->model->getRelations(),
    //             $this->model->getKeyName(),
    //             $this->model->getTable())
    //         ->paginated($request, $this->model->getTable());
    // }

    /**
     * find information by conditionals
     *
     * @return model
     *
     */
    public function find($id) {
        $query = $this->model;

        if (!empty($this->relations)) {
            $query = $query->with(['status', 'offer', 'meshs' => function($query) {
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
    public function setEducationLevel($conditions, $params) {
        return EducationLevel::where($conditions)->update($params);
    }
}
