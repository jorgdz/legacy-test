<?php

namespace App\Repositories;

use App\Models\StudentRecordPeriod;
use App\Repositories\Base\BaseRepository;

class StudentRecordPeriodRepository extends BaseRepository
{
    protected $relations = ['student_record', 'period', 'status'];
    protected $parents = ['periods', 'status']; /* Name of rable relationals */
    protected $selfFieldsAndParents = ['per_name', 'per_reference', 'st_name']; /* Fields of table relationals */
    
    /**
     * __construct
     *
     * @param  mixed $studentRecordPeriod
     * @return void
     */
    public function __construct (StudentRecordPeriod $studentRecordPeriod) {
        parent::__construct($studentRecordPeriod);
    }

    /**
     * findByConditionals
     *
     * @param  mixed $conditionals
     * @return void
     */
    public function findByConditionals($conditionals) {
        $query = $this->model;

        if (!empty($this->relations)) $query = $query->with($this->relations);

        return $query->where($conditionals)->first();
    }
}
