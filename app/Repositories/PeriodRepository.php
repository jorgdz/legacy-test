<?php

namespace App\Repositories;

use App\Models\Period;
use App\Repositories\Base\BaseRepository;

class PeriodRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['campus', 'typePeriod', 'status','offers','periodStages', 'hourhands', 'studentRecords']; // 'courses'

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['campus', 'type_periods', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['per_name','per_reference'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'per_name','per_reference',
        'cam_name', 'cam_description', 'cam_direction', 'cam_initials',
        'tp_name',
        'st_name'
    ];

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
        //$studentRecord->studentRecordPrograms()->where('student_record_id',)
        $query = $period->offers()->wherePivot('period_id', $period->id)->with([
            'status',
            'educationLevels',
            'simbologies'
        ]);

        $fields = ['off_name'];

        if (isset(request()->query()['search'])) {
            $query = $query->where(function ($query) use ($fields) {
                for($i = 0; $i < count($fields); $i ++) {
                    $query->orwhere($fields[$i], 'like',  '%' . strtolower(request()->query()['search']) .'%');
                }
            });
        }

        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';

        return $query->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ?: 100);
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

    /**
     * showHourhandsByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function showHourhandsByPeriod(Period $period) {

        $query = $period->hourhands()->wherePivot('period_id', $period->id)->with([
            'status'
        ]);

        $fields = [
            'hour_monday',
            'hour_tuesday',
            'hour_wednesday',
            'hour_thursday',
            'hour_friday',
            'hour_saturday',
            'hour_sunday',
            'hour_description'
        ];

        if (isset(request()->query()['search'])) {
            $query = $query->where(function ($query) use ($fields) {
                for($i = 0; $i < count($fields); $i ++) {
                    $query->orwhere($fields[$i], 'like',  '%' . strtolower(request()->query()['search']) .'%');
                }
            });
        }

        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';

        return $query->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ?: 100);
    }

    /**
     * destroyHourhandsByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function destroyHourhandsByPeriod(Period $period) {
        $period->hourhands()->detach();
        return $period;
    }

}
