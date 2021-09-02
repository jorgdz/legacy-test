<?php

namespace App\Repositories;

use App\Models\TypeMatter;
use App\Repositories\Base\BaseRepository;

class TypeMatterRepository extends BaseRepository
{

    protected $relations = ['status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeMatter $typeMatter) {
        parent::__construct($typeMatter);
    }
}
