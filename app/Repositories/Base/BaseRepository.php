<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Contracts\IBaseRepository;

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
     * all
     *
     * @return void
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
     * saveUser
     *
     * @param  mixed $user
     * @return void
     */
    public function save (Model $model) {
        $model->save();
        return $model;
    }
}
