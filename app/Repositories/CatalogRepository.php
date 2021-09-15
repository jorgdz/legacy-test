<?php

namespace App\Repositories;

use App\Models\Catalog;
use App\Repositories\Base\BaseRepository;

class CatalogRepository extends BaseRepository
{

    protected $relations = ['children'];
    protected $fields = ['cat_name', 'cat_acronym'];

    /**
     * __construct
     *
     * @param App\Models\Catalog $catalog
     * @return void
     */
    public function __construct (Catalog $catalog) {
        parent::__construct($catalog);
    }
}
