<?php

namespace App\Repositories;

use App\Models\TypeCalification;
use App\Repositories\Base\BaseRepository;

class TypeCalificationRepository extends BaseRepository
{

    protected $relations = ['status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (TypeCalification $typeCalification) {
        parent::__construct($typeCalification);
    }
}
