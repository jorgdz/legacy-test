<?php

namespace App\Repositories;

use App\Models\InstituteType;
use App\Repositories\Base\BaseRepository;

class InstituteTypeRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'institutes'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['tin_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['tin_name', 'st_name'];

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
