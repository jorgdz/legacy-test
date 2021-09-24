<?php

namespace App\Repositories;

use App\Models\ClassroomType;
use App\Repositories\Base\BaseRepository;

class ClassroomTypeRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'classrooms'];

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
    protected $fields = ['clt_name'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['clt_name', 'st_name'];


    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ClassroomType $classroomType) {
        parent::__construct($classroomType);
    }

}
