<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\IBaseRepository;

class BaseRepository implements IBaseRepository
{

    protected $model;

    protected $relations = [];

    protected $fields = [];

    protected $selfFieldsAndParents = [];

    protected $selected = ['*'];

    protected $parents = [];

    protected $data;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Model $model) {
        $this->model = $model;
        $this->data = new ListBaseRepository($model, $this->parents,
            $this->selfFieldsAndParents);
    }

    /**
     * get all information
     *
     * @return model
     *
     */
    public function all ($request) {
        if (isset($request['data']))
            return ($request['data'] === 'all') ? $this->data->withOutPaginate($this->selected)->getCollection() : [];

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

    /**
     * find information by conditionals
     *
     * @return model
     *
     */
    public function find($id) {
        $query = $this->model;

        if (!empty($this->relations)) {
            $query = $query->with($this->relations);
        }

        return $query->findOrFail($id);
    }

     /**
     * find the specified resource.
     *
     * @param array $conditionals
     * @return Illuminate\Database\Eloquent\Model
     *
     */
    public function findByConditionals($conditionals) {
        $query = $this->model;

        if (!empty($this->relations)) {
            $query = $query->with($this->relations);
        }

        return $query->where($conditionals)->firstOrFail();
    }

    /**
     * add/set register
     *
     * @param mixed $model
     * @return model
     *
     */
    public function save (Model $model) {
        $model->save();
        return $model;
    }

    /**
     * delete a information
     * @param array $condition
     *
     * @return model
     *
     */
    public function destroy (Model $model) {
        $model->delete();
        return $model;
    }
}
