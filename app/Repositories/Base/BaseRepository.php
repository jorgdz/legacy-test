<?php

namespace App\Repositories\Base;

use App\Exceptions\Custom\NotFoundException;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\IBaseRepository;
use App\Exceptions\Custom\UnprocessableException;

class BaseRepository implements IBaseRepository
{

    protected $model;

    protected $relations = [];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Model $model) {
        $this->model = $model;
    }

    /**
     * get all information
     *
     * @return model
     * 
     */
    public function all ($request) {
        $query = $this->model;

        if (!empty($this->relations)) {
            $query = $query->with($this->relations);
        }
        
        $collectQueryString = collect($request->all())
            ->except(['page', 'size', 'sort', 'type_sort'])->all();
        
        if (!empty($collectQueryString)) {
            $query = $query->where($collectQueryString);
        }

        $sort = $request->sort ?: 'id';
        $type_sort = $request->type_sort ?: 'desc';

        return $query->orderBy($sort, $type_sort)
            ->simplePaginate($request->size ?: 100);
    }

    /**
     * find information by conditionals
     * 
     * @return model
     * 
     */
    public function find($id) {
        return $this->model::findOrFail($id);
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
