<?php

namespace App\Repositories;

use App\Models\CriteriaStudentRecord;
use App\Repositories\Base\BaseRepository;

class CriteriaStudentRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['typeCriteria', 'studentRecord'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['type_criterias'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['qualification'];

    protected $selfFieldsAndParents = [
        'qualification',
        'crit_name',
        'crit_description',
        'crit_acronym',
        'crit_qualifity',
    ];

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
