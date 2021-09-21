<?php

namespace App\Http\Controllers\Api;

use Exception;
use Throwable;
use App\Models\User;
use App\Models\Person;
use App\Traits\Helper;
use App\Models\Student;
use App\Cache\StudentCache;
use Illuminate\Support\Str;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreStudentRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\DatabaseException;

class StudentController extends Controller
{
    use RestResponse,Helper;

    /**
     * studentRecordCache
     *
     * @var mixed
     */
    private $studentCache;

    /**
     * __construct
     *
     * @param  mixed $studentRecordCache
     * @return void
     */
    public function __construct(StudentCache $studentCache)
    {
        $this->studentCache = $studentCache;
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
        $person = new Person($request->except(['email','campus_id','modalidad_id','jornada_id']));
        $person->save();
        $user = new User($request->only(['email']));
        
        $user->us_username = $request->get('pers_identification');
        $user->password = Hash::make(Str::random(8));
        $user->person_id = $person->id;
        $user->status_id = 1;
        $user->save();
        
        if(!is_null(Student::where('user_id',$user->id)->first()))
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(Student::class)]));

        $student = new Student($request->only(['campus_id','modalidad_id','jornada_id']));
        $student->stud_code = $this->stud_code_avaliable();
        $student->user_id = $user->id;
        $student->status_id = 1;
        
        $student->save();

        DB::commit();
        }catch(Exception $ex){
            DB::rollback();
            //dd($ex->errorInfo[2]);
            throw new DatabaseException($ex->errorInfo[2]);
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
        return $this->success($this->studentCache->find($id));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $studentRecord
     * @return void
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * destroy
     *
     * @param  mixed $studentRecord
     * @return void
     */
    public function destroy(Student $student)
    {
        //
    }
}
