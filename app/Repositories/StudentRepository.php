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
    protected $relations = ['studentRecords', 'studentDocuments' , 'status', 'campus','daytrip','user','user.person']; //studentRecordsPeriods,'modality'

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'stud_observation',
        'stud_code',
        'cam_name',
        'cam_description',
        'cam_direction',
        'cam_initials',
        'typ_day_name',
        'typ_day_description',
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
        'pers_profession'
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

    public function all ($request) {
        $query = Student::select('students.*','c.*','dt.*','m.*','s.*','u.us_username','u.email','p.*')
                      ->join('campus as c','c.id','=','students.campus_id')
                      ->join('type_daytrip as dt','dt.id','=','students.jornada_id')
                      ->join('modalities as m','m.id','=','students.modalidad_id')
                      ->join('status as s','s.id','=','students.status_id')
                      ->join('users as u','u.id','=','students.user_id')
                      ->join('persons as p','p.id','=','u.person_id');
        
        //$query = $query->setHidden(['password']);

        $collectQueryString = collect($request->all())
        ->except(['page', 'size', 'sort', 'type_sort', 'user_profile_id', 'search'])->all();
        
        if (!empty($collectQueryString)) {
            $query = $query->where($collectQueryString);
        }

        $sort = $request->sort ?: 'id';
        $type_sort = $request->type_sort ?: 'desc';

        if ($request->search) {
            $fields = $this->fields;
            $query= $query->where(function ($query) use($fields, $request) {
                for ($i = 0; $i < count($fields); $i++){
                    $query->orwhere($fields[$i], 'like',  '%' . $request->search .'%');
                }      
            });
        }

        return $query->orderBy($sort, $type_sort)->paginate($request->size ?: 100);
    }
}
