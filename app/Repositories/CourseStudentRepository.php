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
     * relations
     *
     * @var array
     */
    protected $relations = ['studentRecord', 'subjectStatus', 'subject', 'SubjectCurriculum', 'curriculum','period', 'approvalReason','status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (CourseStudent $courseStudent) {
        parent::__construct($courseStudent);
    }

}
