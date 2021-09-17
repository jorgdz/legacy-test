<?php

namespace App\Repositories\Base;

use App\Models\City;
use App\Models\TypeLanguage;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\IBaseRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BaseRepository implements IBaseRepository
{

    protected $model;

    protected $relations = [];

    protected $fields = [];

    protected $selfFieldsAndParents = [];

    protected $selected = ['*'];

    protected $parents = [];

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
        $fields = $this->fields;


        if (isset($request['data'])) return $query->select($this->selected)->get();

        if (!empty($this->relations))
            $query = $query->with($this->relations);

        $collectQueryString = collect($request->all())
            ->except(['page', 'size', 'sort', 'type_sort', 'user_profile_id', 'search', 'data', 'conditions'])->all();

        if (!empty($collectQueryString))
            $query = $query->where($collectQueryString);

        if (isset($request['conditions']))
            $query = $query->where($request['conditions']);


        if ($request->search) {

            $query = $query->when($request, function ($query) use ($request, $fields) {

                if($this->getParents() == 0) {
                    $query = $query->where(function ($query) use ($request, $fields) {

                        for($i=0; $i < count($fields); $i++) {
                            $query->orwhere($fields[$i], 'like',  '%' . strtolower($request->search) .'%');
                        }

                    });
                } else {

                    if(count($this->model->getRelations()) > 0) {

                        for($i = 0; $i < count($this->getParents()); $i++) {

                            $query->join($this->getParent($i), function($join) use ($i) {

                                $join->on($this->getParent($i).".".$this->model->getKeyName(),
                                    $this->model->getTable().".".$this->model->getRelation($i)
                                );

                            });

                        }

                        $selfFieldsAndParents = $this->selfFieldsAndParents;
                        $query = $query->where(function ($query) use ($request, $selfFieldsAndParents) {
                            for($i=0; $i < count($selfFieldsAndParents); $i++) {
                                $query->orwhere($selfFieldsAndParents[$i], 'like',  '%' . strtolower($request->search) .'%');
                            }
                        });

                    } else {
                        $query = $query->where(function ($query) use ($request, $fields) {
                            for($i=0; $i < count($fields); $i++) {
                                $query->orwhere($fields[$i], 'like',  '%' . strtolower($request->search) .'%');
                            }
                        });
                    }

                }

            });
        }

        $sort = $this->model->getTable(). '.'. $request->sort ?: $this->model->getTable().'.id';
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

    /**
     * Get all the loaded parents for the instance.
     *
     * @return array|int
     */
    private function getParents()
    {
        if(count($this->parents) > 0)
            return $this->parents;

        return 0;
    }


    /**
     * Get a specified parent.
     *
     * @param  string  $parent
     * @return mixed
     */
    private function getParent($parent)
    {
        return $this->parents[$parent];
    }
}
