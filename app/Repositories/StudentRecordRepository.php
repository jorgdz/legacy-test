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
     * parents
     *
     * @var array
     */
    protected $parents = ['students', 'education_levels', 'pensums', 'type_students', 'periods', 'status'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'stud_code',
        'edu_name', 'edu_alias', 'edu_order',
        'pen_name', 'pen_acronym', 'anio',
        'te_name',
        'per_name','per_reference',
        'st_name'
    ];

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
