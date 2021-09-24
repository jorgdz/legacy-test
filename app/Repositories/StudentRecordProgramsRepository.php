<?php

namespace App\Repositories;

use App\Models\StudentRecordProgram;
use App\Models\TypeStudentProgram;
use App\Repositories\Base\BaseRepository;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;

/**
 * StudentRecordProgramsRepository
 */
class StudentRecordProgramsRepository extends BaseRepository
{

    protected $relations = [
        'studentRecord', 'typeStudentProgram', 'status',
        //informacion de las tablas padres relacionadas 
        'studentRecord.economicGroup',
        'studentRecord.period',
        'studentRecord.pensum',
        'studentRecord.educationLevel',
        'studentRecord.typeStudent',
        //estudiante->usuario->persona
        'studentRecord.student.user.person',

    ];


    //nombres de tablas padres
    protected $parents = ['type_student_programs', 'status'];

    //campos a buscar en las tablas padres
    protected $selfFieldsAndParents = [
        'typ_stu_pro_name',
        'typ_stu_pro_description',
        'typ_stu_pro_acronym',
        'st_name'
    ];



    /**
     * __construct
     *
     * @return void
     */
    public function __construct(StudentRecordProgram $studentRecordProgram)
    {
        parent::__construct($studentRecordProgram);
    }


    public function allTypeStudentPrograms(Request $request, StudentRecordProgram $studentRecordProgram)
    {

        $query = StudentRecordProgram::where('student_record_id', $studentRecordProgram->student_record_id)
            ->with(['status', 'type_student_program' => function ($query) {
                $fields = ['typ_stu_pro_name', 'typ_stu_pro_acronym'];

                if (isset(request()->query()['search'])) {
                    $query = $query->where(function ($query) use ($fields) {
                        for ($i = 0; $i < count($fields); $i++) {
                            $query->orwhere($fields[$i], 'like',  '%' . strtolower(request()->query()['search']) . '%');
                        }
                    });
                }
            }]);


        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';


        return $query->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ? request()->query()['size'] : 100);
    }
}
