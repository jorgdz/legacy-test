<?php

namespace App\Repositories;

use App\Models\InstituteType;
use App\Repositories\Base\BaseRepository;

class InstituteTypeRepository extends BaseRepository
{
    protected $relations = ['status'];
    protected $fields = ['tin_name'];

    /**
     * __construct
     *
     * @param  mixed $instituteType
     * @return void
     */
    public function __construct(InstituteType $instituteType)
    {
        parent::__construct($instituteType);
    }
}
