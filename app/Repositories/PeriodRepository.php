<?php

namespace App\Repositories;

use App\Models\Period;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;

class PeriodRepository extends BaseRepository
{
    protected $relations = ['campus', 'typePeriods', 'status'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Period $period) {
        parent::__construct($period);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $period) {
        $period->save();
        return $period;
    }

    /**
     * delete a information
     * @param array $condition
     *
     * @return model
     *
     */
    public function destroy (Model $model) {
        $model->offerPeriod()->delete();
        $model->delete();
        return $model;
    }
}