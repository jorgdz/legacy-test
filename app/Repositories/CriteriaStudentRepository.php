<?php

namespace App\Repositories;

use App\Models\CriteriaStudentRecord;
use App\Repositories\Base\BaseRepository;

class CriteriaStudentRepository extends BaseRepository
{

    protected $relations = ['typeCriteria', 'studentRecord'];

    /**
     * __construct
     *
     * @param  mixed $criteriaStudentRecord
     * @return void
     */
    public function __construct(CriteriaStudentRecord $criteriaStudentRecord)
    {
        parent::__construct($criteriaStudentRecord);
    }
}
