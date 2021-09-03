<?php

namespace App\Repositories;

use App\Models\PeriodStage;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class PeriodStageRepository extends BaseRepository
{
    protected $relations = ['periods', 'stages', 'status'];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PeriodStage $periodstage) {
        parent::__construct($periodstage);
    }
}
