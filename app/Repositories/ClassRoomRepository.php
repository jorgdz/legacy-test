<?php

namespace App\Repositories;

use App\Models\ClassRoom;
use App\Repositories\Base\BaseRepository;

class ClassRoomRepository extends BaseRepository {

    protected $relations = ['status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ClassRoom $classRoom) {
        parent::__construct($classRoom);
    }

}
