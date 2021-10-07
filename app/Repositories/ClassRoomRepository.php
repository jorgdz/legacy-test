<?php

namespace App\Repositories;

use App\Models\ClassRoom;
use App\Repositories\Base\BaseRepository;

class ClassRoomRepository extends BaseRepository {

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['campus','classroomType', 'classroomEducationLevel', 'status'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['campus','classroom_types', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['cl_name', 'cl_cap_max','cl_acronym', 'cl_description'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'cl_name', 'cl_cap_max', 'cl_acronym', 'cl_description',
        'cam_name', 'cam_description', 'cam_direction', 'cam_initials',
        'clt_name',
        'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ClassRoom $classRoom) {
        parent::__construct($classRoom);
    }
}
