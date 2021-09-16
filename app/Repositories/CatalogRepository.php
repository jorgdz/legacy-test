<?php

namespace App\Repositories;

use App\Models\Catalog;
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
        $query = $this->model->select($this->selected);

        if ($this->relations) $query = $query->with($this->relations);

        if (isset($request['data'])) {
            if ($request->search) {
                $fields = $this->fields;
                $query = $query->where(function ($query) use($fields, $request) {
                    for ($i = 0; $i < count($fields); $i++){
                        $query->where($fields[$i], $request->search);
                    }      
                });
            }
            return $query->get();
        }

        $collectQueryString = collect($request->all())
            ->except(['page', 'size', 'sort', 'type_sort', 'user_profile_id', 'search', 'data', 'conditions'])->all();

        if (!empty($collectQueryString)) 
            $query = $query->where($collectQueryString);

        if (isset($request['conditions'])) 
            $query = $query->where($request['conditions']);

        $sort = $request->sort ?: 'id';
        $type_sort = $request->type_sort ?: 'desc';

        return $query->orderBy($sort, $type_sort)->paginate($request->size ?: 100);
    }
}
