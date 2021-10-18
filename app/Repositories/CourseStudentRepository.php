<?php

namespace App\Repositories;

use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\CourseStudent;


/**
 * CampusRepository
 */
class CourseStudentRepository extends BaseRepository
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (CourseStudent $courseStudent) {
        parent::__construct($courseStudent);
    }

}
