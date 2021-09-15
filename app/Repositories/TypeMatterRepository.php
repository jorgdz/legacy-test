<?php

namespace App\Repositories;

use App\Models\TypeMatter;
use App\Repositories\Base\BaseRepository;

class TypeMatterRepository extends BaseRepository
{

    protected $relations = ['status'];
    protected $fields = ['tm_name', 'tm_acronym'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeMatter $typeMatter) {
        parent::__construct($typeMatter);
    }
}
