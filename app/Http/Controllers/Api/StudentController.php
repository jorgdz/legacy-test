<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Models\Person;
use App\Traits\Helper;
use App\Models\Student;
use App\Cache\StudentCache;
use App\Mail\EmailRegister;
use Illuminate\Support\Str;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreStudentRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\DatabaseException;
use App\Exceptions\Custom\NotFoundException;
use App\Exceptions\Custom\SendMailException;
use App\Http\Controllers\Api\Contracts\IStudentController;
use App\Http\Requests\StudentPhotoRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\CustomTenant;
use App\Models\StudentRecord;
use App\Services\FilesystemService;
use App\Services\MailService;

class StudentController extends Controller implements IStudentController
{
    use RestResponse, Helper;

    /**
     * studentCache
     *
     * @var mixed
     */
    private $mailService;
    private $studentCache;
    private $filesystemService;

    /**
     * __construct
     *
     * @param  mixed $studentCache
     * @return void
     */
    public function __construct(StudentCache $studentCache, FilesystemService $filesystemService, MailService $mailService)
    {
        $this->studentCache = $studentCache;
        $this->mailService = $mailService;
        $this->filesystemService = $filesystemService;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->studentCache->all($request));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StoreStudentRequest $request)
    {
        DB::beginTransaction();
        try {
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

            $studentRecord = new StudentRecord($request->only(['education_level_id', 'mesh_id', 'type_student_id', 'economic_group_id']));
            $studentRecord->student_id =  $student->id;
            $studentRecord->status_id = 1;
            $studentRecord->save();

            DB::commit();

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

            return $this->information(__('messages.model-saved-successfully', ['model' => 'Estudiante']));
        } catch (Exception $ex) {
            DB::rollback();
            throw new SendMailException(__('messages.send-error-mail'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Student $student)
    {
        return $this->success($this->studentCache->find($student->id));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return void
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->fill($request->all());
        if ($student->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->studentCache->save($student));
    }

    /**
     * destroy
     *
     * @param  mixed $student
     * @return void
     */
    public function destroy(Student $student)
    {
        return $this->success($this->studentCache->destroy($student));
    }

    /**
     * updatePhoto
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return void
     */
    public function updatePhoto(StudentPhotoRequest $request)
    {
        $student = Student::where('user_id', $request->user()->id)->first();
        if (is_null($student))
            throw new NotFoundException(__('messages.no-exist-instance-resource'));

        $response = $this->filesystemService->store($request);

        $request->replace(['stud_photo' => $response[0]['route']]);

        $student->fill($request->all());
        if ($student->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->studentCache->save($student));
    }
}
