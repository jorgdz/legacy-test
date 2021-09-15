<?php

namespace App\Repositories;

use App\Models\TypeReligion;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeReligionRepository extends BaseRepository
{

    protected $relations = ['status', 'persons'];
    protected $fields = ['typ_rel_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeReligion $typeReligion) {
        parent::__construct($typeReligion);
    }
}
