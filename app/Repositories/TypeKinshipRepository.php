<?php

namespace App\Repositories;

use App\Models\TypeKinship;
use App\Repositories\Base\BaseRepository;

/**
 * TypeKinshipRepository
 */
class TypeKinshipRepository extends BaseRepository
{

    protected $relations = ['status'];
    protected $fields = ['typ_kin_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeKinship $typekinship) {
        parent::__construct($typekinship);
    }
}
