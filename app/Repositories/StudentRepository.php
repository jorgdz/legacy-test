<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Base\BaseRepository;

class StudentRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['studentRecords', 'modality', 'status', 'campus','daytrip','user']; //studentRecordsPeriods

    /**
     * __construct
     *
     * @param  mixed $student
     * @return void
     */
    public function __construct(Student $student)
    {
        parent::__construct($student);
    }

}
