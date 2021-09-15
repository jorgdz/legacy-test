<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\IBaseRepository;

class BaseRepository implements IBaseRepository
{

    protected $model;

    protected $relations = [];

    protected $fields = [];

    protected $selected = ['*'];

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
        
        if (isset($request['data'])) return $query->select($this->selected)->get();

        if (!empty($this->relations)) {
            $query = $query->with($this->relations);
        }

        $collectQueryString = collect($request->all())
            ->except(['page', 'size', 'sort', 'type_sort', 'user_profile_id', 'search', 'data', 'conditions'])->all();

        if (!empty($collectQueryString)) 
            $query = $query->where($collectQueryString);

        if (isset($request['conditions'])) 
            $query = $query->where($request['conditions']);

        if ($request->search) {
            $fields = $this->fields;
            $query= $query->where(function ($query) use($fields, $request) {
                for ($i = 0; $i < count($fields); $i++){
                    $query->orwhere($fields[$i], 'like',  '%' . $request->search .'%');
                }      
            });
        }

        $sort = $request->sort ?: 'id';
        $type_sort = $request->type_sort ?: 'desc';

        return $query->orderBy($sort, $type_sort)
            ->paginate($request->size ?: 100);
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
