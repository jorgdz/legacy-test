<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Base\BaseRepository;

class StudentRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['studentRecords', 'studentDocuments' , 'status', 'campus', 'modality', 'daytrip', 'user', 'user.person']; //studentRecordsPeriods

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'stud_observation',
        'stud_code',
        'cam_name',
        'cam_initials',
        'st_name',
        'us_username',
        'email',
        'pers_identification',
        'pers_firstname',
        'pers_secondname',
        'pers_first_lastname',
        'pers_second_lastname',
        'pers_gender',
        'pers_date_birth',
        'pers_direction',
        'pers_phone_home',
        'pers_cell',
        'pers_profession',
        'modality.cat_name',
        'daytrip.cat_name'
    ];

    /**
     * __construct
     *
     * @param  mixed $student
     * @return void
     */
    public function __construct(Student $student)
    {
        parent::__construct($student);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all ($request) {

        if (isset($request['data']))
            return ($request['data'] === 'all') ? $this->data->withOutPaginate($this->selected)->getCollection() : [];

        $query = Student::select(
            'students.*',
            'c.cam_name',
            'cam_initials',
            's.st_name',
            'u.us_username',
            'u.email',
            'p.id as person_id',
            'p.pers_identification',
            'p.pers_firstname',
            'p.pers_secondname',
            'p.pers_first_lastname',
            'p.pers_second_lastname',
            'p.pers_gender',
            'p.pers_date_birth',
            'p.pers_direction',
            'p.pers_phone_home',
            'p.pers_cell',
            'p.pers_profession')->join('campus as c','c.id','=','students.campus_id')->join('status as s','s.id','=','students.status_id')
                                ->join('users as u','u.id','=','students.user_id')->join('persons as p','p.id','=','u.person_id')
                                ->join('catalogs as modality', 'modality.id', '=', 'students.modalidad_id')
                                ->join('catalogs as daytrip', 'daytrip.id', '=', 'students.jornada_id')
                                ->with(['status', 'campus', 'modality', 'daytrip']);

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
                    $query->orwhere($fields[$i], 'like',  '%' . $request->search .'%');
                }
            });
        }

        return $query->orderBy($sort, $type_sort)->paginate($request->size ? $request->size : 100);
    }

}
