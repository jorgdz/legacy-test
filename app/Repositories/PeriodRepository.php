<?php

namespace App\Repositories;

use App\Models\Period;
use App\Repositories\Base\BaseRepository;

class PeriodRepository extends BaseRepository
{
    protected $relations = ['campus', 'typePeriod', 'status','offers','periodStages', 'hourhands', 'studentRecords']; // 'courses'

    protected $fields = ['per_name','per_reference'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Period $period) {
        parent::__construct($period);
    }

    /**
     * showOffersByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function showOffersByPeriod(Period $period) {
        return $period->offers;
    }

    /**
     * destroyOffersByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function destroyOffersByPeriod(Period $period) {
        $period->offers()->detach();
        return $period;
    }

}
