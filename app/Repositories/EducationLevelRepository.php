<?php

namespace App\Repositories;

use App\Models\EducationLevel;
use App\Repositories\Base\BaseRepository;

/**
 * EducationLevelRepository
 */
class EducationLevelRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'status','offer', 'meshs', 'children'
    ];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['offers', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'edu_name',
        'edu_alias',
        'edu_order',
        'principal_id'
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'edu_name',
        'edu_alias',
        'edu_order',
        'off_name',
        'st_name',
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(EducationLevel $educationLevel) {
        parent::__construct($educationLevel);
    }

    public function setEducationLevel($conditions, $params) {
        return EducationLevel::where($conditions)->update($params);
    }
}
