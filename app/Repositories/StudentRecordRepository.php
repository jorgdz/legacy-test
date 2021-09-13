<?php

namespace App\Repositories;

use App\Models\StudentRecord;
use App\Repositories\Base\BaseRepository;

class StudentRecordRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['student', 'educationLevel', 'pensum', 'typeStudent', 'period', 'status', 'criteriaStudentRecords']; //studentRecordsPeriods

    /**
     * __construct
     *
     * @param  mixed $studentRecord
     * @return void
     */
    public function __construct(StudentRecord $studentRecord)
    {
        parent::__construct($studentRecord);
    }

}
