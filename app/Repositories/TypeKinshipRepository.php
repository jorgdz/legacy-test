<?php

namespace App\Repositories;

use App\Models\Typekinship;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeKinshipRepository extends BaseRepository
{

    protected $relations = ['status'/* , 'institutes', 'persons' */];
    protected $fields = ['typ_kin_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Typekinship $typekinship) {
        parent::__construct($typekinship);
    }
}
