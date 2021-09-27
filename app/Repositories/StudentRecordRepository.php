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
    protected $relations = [
        'student',
        'educationLevel',
        // 'pensum',
        'mesh',
        'typeStudent',
        'period',
        'economicGroup',
        'status',
        'criteriaStudentRecords',
        'studentRecordPrograms.type_student_program'

    ]; //studentRecordsPeriods


    /**
     * parents
     *
     * @var array
     */
    protected $parents = [
        'students', 
        'education_levels', 
        // 'pensums', 
        'meshs',
        'type_students', 
        'periods', 
        'status'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'stud_code',
        'edu_name', 'edu_alias', 'edu_order',
        'mes_name','mes_description','mes_acronym','anio',
        //'pen_name', 'pen_acronym', 'anio',
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
