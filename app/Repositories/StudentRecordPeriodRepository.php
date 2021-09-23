<?php

namespace App\Repositories;

use App\Models\StudentRecordPeriod;
use App\Repositories\Base\BaseRepository;

class StudentRecordPeriodRepository extends BaseRepository
{
    protected $relations = [];
    protected $fields = [];
    
    /**
     * __construct
     *
     * @param  mixed $studentRecordPeriod
     * @return void
     */
    public function __construct (StudentRecordPeriod $studentRecordPeriod) {
        parent::__construct($studentRecordPeriod);
    }
}
