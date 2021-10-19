<?php

namespace App\Repositories;

use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\ClassroomEducationLevel;


/**
 * CampusRepository
 */
class ClassroomEducationLevelRepository extends BaseRepository
{
    protected $relations = ['status', 'period', 'classRoom', 'classRoom.classroomType', 'educationLevel'];

    protected $fields = [
        'el.edu_name',
        'p.per_name'
    ];



    /**
     * parents
     * Name of rable relationals
     * @var array
     */
    protected $parents = [
        'classrooms',
        'education_levels',
        'periods',
        'status',
        // 'classroom_type'
    ];

    /**
     * selfFieldsAndParents
     * Fields of table relationals
     * @var array
     */
    protected $selfFieldsAndParents = [
        'cl_name',
        'cl_cap_max',
        'cl_acronym',
        'cl_description',
        'per_name', 'per_reference', 'per_current_year', 'per_due_year',
        'per_min_matter_enrollment', 'per_max_matter_enrollment',
        'per_num_fees', 'per_fees_enrollment', 'per_pay_enrollment',
        'st_name',
        'edu_name', 'edu_alias', 'edu_order',
        // 'classroom_type.clt_name',
        // 'classroom_type.clt_description'
    ];



    /**
     * __construct
     *
     * @return void
     */
    public function __construct(ClassroomEducationLevel $classroomEducationLevel)
    {
        parent::__construct($classroomEducationLevel);
    }

    public function all($request)
    {

        if (isset($request['data']))
            return ($request['data'] === 'all') ? $this->data->withOutPaginate($this->selected)->getCollection() : [];

        $query = ClassroomEducationLevel::select(
            'classroom_education_levels.*',
            'el.edu_name',
            'p.per_name'
        )
            ->join('education_levels as el', 'el.id', '=', 'classroom_education_levels.education_level_id')
            ->join('periods as p', 'p.id', '=', 'classroom_education_levels.period_id')
            ->with(['status', 'period', 'classRoom', 'educationLevel']);

        $collectQueryString = collect($request->all())
            ->except(['page', 'size', 'sort', 'type_sort', 'user_profile_id', 'search'])->all();

        if (!empty($collectQueryString)) {
            $query = $query->where($collectQueryString);
        }

        $sort = $request->sort ? $request->sort : $this->model->getTable() . '.id';
        $type_sort = $request->type_sort ? $request->type_sort : 'desc';

        if ($request->search) {
            $fields = $this->fields;
            $query = $query->where(function ($query) use ($fields, $request) {
                for ($i = 0; $i < count($fields); $i++) {
                    //$query->orwhere($fields[$i], 'like',  '%' . $request->search .'%');
                    $query->orwhere($fields[$i], 'like', $request->search);
                }
            });
        }

        return $query->orderBy($sort, $type_sort)->paginate($request->size ? $request->size : 100);
    }

    public function saveMultiple($classrooms)
    {
        return ClassroomEducationLevel::insert($classrooms);
    }

    public function changeStatus($id, $status)
    {
        $classRoom = ClassroomEducationLevel::findOrFail($id);
        if ($classRoom) {
            $classRoom->status_id = $status;
            $classRoom->save();
        }
        return $classRoom;
    }

    /**
     * validateRegister
     *
     * Registro Unico por :Materia,horario,modalidad,paralelo)
     */

    public function getClassroomAssigned($request)
    {
        $currentClassrooms = $this->model
            ->distinct()
            ->where('period_id', $request->period_id)
            ->pluck('classroom_id')
            ->toArray();
        //1

        $classroomsAssigned    = array_merge(array_diff($request->classrooms, $currentClassrooms));
        $classroomsNotAssigned = array_merge(array_intersect($request->classrooms, $currentClassrooms));

        $classrooms = new \stdClass();
        $classrooms->classrooms_assigned   = $classroomsAssigned;
        $classrooms->classrooms_not_assigned = $classroomsNotAssigned;

        return $classrooms;
    }


    public function validateRegister($request)
    {
        $currentClassrooms = $this->model
            ->where([
                ['period_id', $request->period_id],
                ['education_level_id', $request->education_level_id]
            ])
            ->distinct()
            ->pluck('classroom_id')
            ->toArray();
        $classrooms = array_merge(array_diff($request->classrooms, $currentClassrooms), array_diff($currentClassrooms, $request->classrooms));
        return $classrooms;
    }



    public function classEduLvsByPeriodByEduLevRepo($condition)
    {

        $query = $this->model;


        if (isset(request()->query()['data'])) {
            array_push($this->relations, 'classRoom.classroomType');
            $query =  $query->where($condition)->with($this->relations)->get();
            return (request()->query()['data'] === 'all') ? $query : [];
        }


        $fields = [
            'classroom_id',
            'period_id',
            'education_level_id'

        ];


        $this->model->setRelations(['classroom_id', 'education_level_id', 'period_id', 'status_id', 'classroom_type_id']);

        //$this->relations = ['status','period','classRoom','educationLevel','classRoom.classroomType'];

        //array_push($this->relations,'classRoom.classroomType');

        return $this->data
            ->withModelRelations($this->relations)
            ->searchWithColumnNames(request())
            ->searchWithConditions(['conditions' => $condition])
            ->filter(
                request(),
                $fields,
                $this->model->getRelations(),
                $this->model->getKeyName(),
                $this->model->getTable()
            )
            ->paginated(request(), $this->model->getTable());
    }
}
