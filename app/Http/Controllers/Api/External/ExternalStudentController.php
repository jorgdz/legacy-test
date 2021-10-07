<?php

namespace App\Http\Controllers\Api\External;

use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\DatabaseException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\CustomTenant;
use App\Models\EducationLevel;
use App\Models\Person;
use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ExternalStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

                return $this->information(__('messages.student-saved'));
            }

            return $this->information(__('messages.meshs-not-vigent'), Response::HTTP_CONFLICT);
        } catch (Exception $ex) {
            DB::rollback();
            throw new DatabaseException($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
