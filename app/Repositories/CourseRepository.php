<?php

namespace App\Repositories;

use App\Repositories\Base\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
use Illuminate\Http\Request;


/**
 * CampusRepository
 */
class CourseRepository extends BaseRepository
{
    protected $relations = ['status','matter','parallel','classroom','collaborator','modality','hourhand','period'];
    
    protected $fields = [
        'max_capacity',
        's.mat_name',
        //'s.mat_acronym',
        'p.per_name',
        'p.per_current_year',
        'c.cl_name',
        //'c.cl_acronym',
        'pa.par_name',
        'ca.cat_name',
        'pe.pers_firstname',
        //'pe.pers_secondname',
        'pe.pers_first_lastname',
        //'pe.pers_second_lastname',
        'pe.pers_identification',
    ];
    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Course $course) {
        parent::__construct($course);
    }

    public function changeStatus($id,$status){
        $classRoom = Course::findOrFail($id);
        if($classRoom) {
            $classRoom->status_id = $status;
            $classRoom->save();
        }
        return $classRoom;
    }

    public function all($request)
    {
        if (isset($request['data']))
            return ($request['data'] === 'all') ? $this->data->withOutPaginate($this->selected)->getCollection() : [];

        
        $query = Course::select(
                            'courses.*',
                            's.mat_name',
                            //'s.mat_acronym',
                            'p.per_name',
                            'p.per_current_year',
                            'c.cl_name',
                            //'c.cl_acronym',
                            'pa.par_name as nombre_paralelo',
                            'ca.cat_name as modalidad',
                            'ca.cat_description as modalidad_descripcion',
                            'pe.pers_firstname',
                            //'pe.pers_secondname',
                            'pe.pers_first_lastname',
                            //'pe.pers_second_lastname',
                            'pe.pers_identification'
                        )
                        ->join('subjects as s','s.id','=','courses.matter_id')
                        ->join('periods as p','p.id','=','courses.period_id')
                        ->join('classrooms as c','c.id','=','courses.classroom_id')
                        ->join('parallels as pa','pa.id','=','courses.parallel_id')
                        ->join('catalogs as ca','ca.id','=','courses.modality_id')
                        ->leftJoin('collaborators as co','co.id','=','courses.collaborator_id')->leftJoin('users as u','u.id','=','co.user_id')->leftJoin('persons as pe','pe.id','=','u.person_id')
                        ->with(['status','matter','hourhand','parallel','classroom','period']);

        $collectQueryString = collect($request->all())
            ->except(['page', 'size', 'sort', 'type_sort', 'user_profile_id', 'search'])->all();

        if (!empty($collectQueryString)) {
            $query = $query->where($collectQueryString);
        }

        $sort = $request->sort ? $request->sort : $this->model->getTable().'.id';
        $type_sort = $request->type_sort ? $request->type_sort : 'desc';

        if ($request->search) {
            $fields = $this->fields;
            $query= $query->where(function ($query) use($fields, $request) {
                for ($i = 0; $i < count($fields); $i++){
                    $query->orwhere($fields[$i], 'like', $request->search );
                }
            });
        }
        return $query->orderBy($sort, $type_sort)->paginate($request->size ? $request->size : 100);
    }

    public function getCollaboratorsInCourse(Request $request)
    {
        $currentCollaboratos = $this->model
                            ->where([
                                ['matter_id'  ,$request->matter_id],
                                ['hourhand_id',$request->hourhand_id],
                                ['modality_id',$request->modality_id],
                                ['parallel_id',$request->parallel_id]
                            ])
                            ->distinct()
                            ->pluck('collaborator_id')
                            ->toArray();

        $collaboratosToAsiggned = array_merge(array_diff($request->collaborators, $currentCollaboratos));
        return $collaboratosToAsiggned;
    }

    public function validateCourseUnique(Request $request, $courseId = null)
    {
        $conditions = [
            ['matter_id'  ,$request->matter_id],
            ['hourhand_id',$request->hourhand_id],
            ['modality_id',$request->modality_id],
            ['parallel_id',$request->parallel_id]
        ];

        if (is_null($courseId)) {
            $course = $this->model->where(
                $conditions
            )
            ->whereNull('collaborator_id')
            //->whereIn('collaborator_id', array())
            ->first();
        }else {
            $course = $this->model->where(
                $conditions
            )
            ->where('collaborator_id',$request->collaborator_id)
            ->whereNotIn('id', [$courseId])
            ->first();
        }
        
        return $course;
    }

    public function saveMultiple($courses){
        return Course::insert($courses);
    }

    public function classroomHasCourses($classroomId)
    {
        $classRoom = Course::where([
                    ['classroom_id'  ,$classroomId],
                    ['status_id','1'],
                ])
                ->whereNull('deleted_at')
                ->count();
        return $classRoom;
    }
}
