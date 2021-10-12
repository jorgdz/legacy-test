<?php

namespace App\Http\Controllers\ApiExternal;

use App\Cache\StudentCache;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\DatabaseException;
use App\Http\Controllers\ApiExternal\Contracts\IExternalStudentController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\CustomTenant;
use App\Models\EducationLevel;
use App\Models\Person;
use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\User;
use App\Services\FilesystemService;
use App\Services\MailService;
use App\Traits\Helper;
use App\Traits\RestResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExternalStudentController extends Controller implements IExternalStudentController
{

    use RestResponse, Helper;

    /**
     * mailService
     *
     * @var mixed
     */
    private $mailService;


    /**
     * __construct
     *
     * @param  mixed $mailService
     * @return void
     */
    public function __construct(MailService $mailService)
    {

        $this->mailService = $mailService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {

        DB::beginTransaction();
        try {

            $educationLevel = EducationLevel::where('id', $request['education_level_id'])->whereRelation('meshs', function ($query) {
                $query->where('status_id', 7);
            })->first();
   
            if ($educationLevel) {
                $person = new Person($request->except(['email', 'campus_id', 'modalidad_id', 'jornada_id']));
                $person->save();
                $user = new User($request->only(['email']));

                $user->us_username = $request->get('pers_identification');
                $password = Str::random(8);
                $user->password = Hash::make($password);
                $user->person_id = $person->id;
                $user->status_id = 1;
                $user->save();

                if (!is_null(Student::where('user_id', $user->id)->first()))
                    throw new ConflictException(__('messages.exist-instance'));

                $student = new Student($request->only(['campus_id', 'modalidad_id', 'jornada_id']));
                $student->stud_code = $this->stud_code_avaliable();
                $student->user_id = $user->id;
                $student->status_id = 1;

                $student->save();

                $studentRecord = new StudentRecord($request->only(['type_student_id', 'economic_group_id']));
                $studentRecord->education_level_id = $educationLevel->id;
                $studentRecord->mesh_id = $educationLevel->meshs[0]['id'];
                $studentRecord->student_id =  $student->id;
                $studentRecord->status_id = 1;
                $studentRecord->save();

                $params = [
                    "template"  => 23,
                    "subject"   => "Registro de usuario",
                    "view"      => "mails.register",
                    "to" => array(
                        ["name" => NULL, "email" => $request->get('email')]
                    ),
                    "params" => [
                        "USERNAME" => $user->us_username,
                        "PASSWORD" => $password,
                        "LINK" => CustomTenant::current()->domain_client,
                    ],
                ];

                $this->mailService->SendEmail($params);

                DB::commit();
                
                return $student;
                //return $this->information(__('messages.student-saved'));
            }

            return $this->information(__('messages.meshs-not-vigent'), Response::HTTP_CONFLICT);
        } catch (Exception $ex) {
            DB::rollback();
            throw new DatabaseException($ex->getInfo[2]);
        }
    }

    
}
