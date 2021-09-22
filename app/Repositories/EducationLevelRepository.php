<?php

namespace App\Repositories;

use App\Models\EducationLevel;
use App\Repositories\Base\BaseRepository;

/**
 * EducationLevelRepository
 */
class EducationLevelRepository extends BaseRepository
{

    protected $relations = [
        'status','offer', 'children'
    ];

    protected $fields = [
        'edu_name',
        'edu_alias',
        'edu_order'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(EducationLevel $educationLevel)
    {
        parent::__construct($educationLevel);
    }
}
