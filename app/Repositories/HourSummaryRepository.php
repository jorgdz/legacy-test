<?php

namespace App\Repositories;

use App\Models\HourSummary;
use App\Repositories\Base\BaseRepository;

/**
 * HourSummaryRepository
 */
class HourSummaryRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'collaborator',
        'educationLevel',
        'period',
        'status',
        'collaborator.user',
        'collaborator.user.person',
    ];




    /**
     * parents
     * Name of rable relationals
     * @var array
     */
    protected $parents = [
        'collaborators',
        'education_levels',
        'periods',
        'status'
    ];



    /**
     * selfFieldsAndParents
     *  Fields of table relationals 
     * @var array
     */
    protected $selfFieldsAndParents = [

        /* collaborator */
        'coll_email', 'coll_type', 'coll_activity', 'coll_journey_hours', 'coll_journey_description',
        /* education_level */
        'edu_name', 'edu_alias',
        /* period */
        'per_name', 'per_reference', 'per_current_year', 'per_due_year',
        /* status */
        'st_name'
    ];



    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'hs_classes',
        'hs_classes_examns_preparation',
        'hs_bonding',
        'hs_tutoring',
        'hs_research',
        'hs_academic_management',
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(HourSummary $hourSummary)
    {
        parent::__construct($hourSummary);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all($request)
    {
        $request['conditions'] = [
            ['period_id', $request['period_id']],
            ['education_level_id', $request['education_level_id']]
        ];

        if (isset($request['data'])) {
            return ($request['data'] === 'all') ?  $this->data
                //->withOutPaginate($this->selected)
                ->withModelRelations($this->relations)
                ->filter($request, $this->fields, $this->model->getRelations(), $this->model->getKeyName(), $this->model->getTable())
                ->getCollection() : [];
        }

        if (isset($request['period_id'], $request['education_level_id']) && !empty($request->period_id) && !empty($request->education_level_id)) {

            return ($request['period_id'] && $request['education_level_id']) ?
                $this->data
                ->withModelRelations($this->relations)
                //->searchWithColumnNames($request)
                ->searchWithConditions($request)
                ->filter(
                    $request,
                    $this->fields,
                    $this->model->getRelations(),
                    $this->model->getKeyName(),
                    $this->model->getTable()
                )
                ->paginated($request, $this->model->getTable()) : [];
        }



        $requestSearch = collect($request->all())->except(['conditions', 'period_id', 'education_level_id']);

        $query =  $this->data
            ->withModelRelations($this->relations)
            ->searchWithColumnNames($requestSearch)
            ->searchWithConditions($requestSearch)
            ->filter(
                $request,
                $this->fields,
                $this->model->getRelations(),
                $this->model->getKeyName(),
                $this->model->getTable()
            )
            ->paginated($request, $this->model->getTable());

        return count($query) > 0 ? $query : [];
    }
}
