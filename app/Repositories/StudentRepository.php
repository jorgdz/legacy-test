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
    protected $relations = ['studentRecords', 'studentDocuments' , 'status', 'campus','daytrip','user']; //studentRecordsPeriods,'modality'

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
