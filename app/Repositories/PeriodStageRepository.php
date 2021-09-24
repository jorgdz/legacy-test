<?php

namespace App\Repositories;

use App\Models\PeriodStage;
use App\Repositories\Base\BaseRepository;

class PeriodStageRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['period', 'stage', 'status'];

    protected $parents = ['stages', 'periods', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['start_date', 'end_date'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'start_date', 'end_date',
        'stg_name', 'stg_acronym',
        'per_name','per_reference',
        'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PeriodStage $periodstage) {
        parent::__construct($periodstage);
    }
}
