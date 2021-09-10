<?php

namespace App\Repositories;

use App\Models\Typekinship;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeKinshipRepository extends BaseRepository
{

    //protected $relations = ['institutes', 'status','persons'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Typekinship $typekinship) {
        parent::__construct($typekinship);
    }
}
