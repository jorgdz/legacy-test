<?php

namespace App\Repositories;

use App\Models\TypeIdentification;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class TypeIdentificationRepository extends BaseRepository
{

    protected $relations = ['persons'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeIdentification $typeIdentification) {
        parent::__construct($typeIdentification);
    }
}
