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
    protected $relations = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['cl_name', 'cl_acronym'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['cl_name', 'cl_acronym', 'st_name'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ClassRoom $classRoom) {
        parent::__construct($classRoom);
    }

}
