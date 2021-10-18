<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CourseStudent;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Traits\Auditor;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use App\Cache\CourseStudentCache;
use App\Http\Requests\CourseStudentRequest;
use App\Http\Requests\ConditionsBySubjectRequest;
use App\Http\Requests\ConditionsGeneralStudentRequest;
use App\Http\Controllers\Api\Contracts\ICourseStudentController;
use App\Models\StudentRecord;
use App\Services\RegisterSubjectStudentService;


class CourseStudentController extends Controller  implements ICourseStudentController
{
    use RestResponse, Auditor;

    private $courseStudentCache, $registerSubjectStudentService;

     /**
     * __construct
     *
     * @return void
     */
    public function __construct (CourseStudentCache $courseStudentCache,
                                RegisterSubjectStudentService $registerSubjectStudentService)
    {
        $this->courseStudentCache = $courseStudentCache;
        $this->registerSubjectStudentService = $registerSubjectStudentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->courseStudentCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStudentRequest $request)
    {
        $response = $this->checkConditionsToSave($request);
        $object = json_decode(json_encode($response), FALSE);

        if($object->success === false)
            return $response;


        $courseStudent = new CourseStudent($request->all());
        $courseStudent = $this->courseStudentCache->save($courseStudent);
        return $this->success($courseStudent, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseStudent  $courseStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->courseStudentCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseStudent  $courseStudent
     * @return \Illuminate\Http\Response
     */
    public function update(CourseStudentRequest $request, CourseStudent $coursestudent)
    {
        //dd($coursestudent->id);
        $coursestudent->fill($request->all());

            if ($coursestudent->isClean())
                return $this->information(__('messages.nochange'));

        $response = $this->checkConditionsToSave($request,$coursestudent->id);
        $object = json_decode(json_encode($response), FALSE);

        if($object->success === false)
            return $response;

            
        $response = $this->courseStudentCache->save($coursestudent); 
        return $this->success($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseStudent  $courseStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseStudent $coursestudent)
    {
        return $this->success($this->courseStudentCache->destroy($coursestudent));
    }
 

    /**
     * checkSubjectConditions
     * 
     * This Method is used to check all conditions to save courseStudent by Subject
     *
     * @param  mixed $request
     * @return void
     */
    public function checkSubjectConditions(Subject $subject, Request $request)
    {
        $conditions = [];
        $periodActive        = $this->registerSubjectStudentService->checkPeriodActive($request);
        $periodSubjectMinMax = $this->registerSubjectStudentService->checkPeriodSubjectMinMax($request);
        $debtsStudent        = $this->registerSubjectStudentService->checkDebtsStudent($request);
        $prerequisitesAprobe = $this->registerSubjectStudentService->checkPrerequisitesAprobe($request);
        $maxNumberFailed     = $this->registerSubjectStudentService->checkSubjectsFailed($request);
        //$hourhandUnique      = $this->registerSubjectStudentService->checkHourhandUnique($request);//No deberia estar aqui porque no tengo el id del curso aun

        array_push($conditions, 
                     $periodActive,$periodSubjectMinMax,$debtsStudent,$prerequisitesAprobe,$maxNumberFailed);

        $response = $this->formatValidationResponse($conditions);
        return $response;
    }


    /**
     * checkConditionsGeneralByStudent
     * 
     * This Method is used to check all conditions general to save courseStudent by Record Student
     *
     * @param  mixed $request
     * @return void
     */
    public function checkConditionsGeneralByStudent(StudentRecord $student ,ConditionsGeneralStudentRequest $request)
    {
        $conditions = [];
        array_push($conditions,
            $this->registerSubjectStudentService->checkDebtsStudent($request),
            $this->registerSubjectStudentService->checkPeriodSubjectMinMax($request)
        );

        $response = $this->formatValidationResponse($conditions);
        return $response;
    }

        
    /**
     * formatValidationResponse
     * 
     * This Method is used to create a structure of response to validitions conditions
     * before the register of subject to the student 
     *
     * @param array $conditions - Array of conditions
     * @return array $condition - Array of response to Frontend
     */
    public function formatValidationResponse($conditions)
    {
        if(count(array_unique($conditions)) === 1){
            $valuesUnique = array_unique($conditions);
            if($valuesUnique[0] === true){
                $successCondition = true;
            } else {
                $successCondition = false;
            }
        }else{
            $successCondition = false;
        }

        $errors = array_filter($conditions, function($v){ 
            return $v !== true; 
        });

        $condition = new \stdClass();
        $condition->success = $successCondition;
        $condition->errors  = $errors;

        return $condition;
    }

        
    /**
     * checkConditionsToSave
     *
     * This Method is used to check all conditions requiered before save courseStudent
     * 
     * @param  mixed $request
     * @return void
     */
    public function checkConditionsToSave($request,$coursestudent = null)
    {
        $conditions = [];

        array_push( $conditions, 
            $this->registerSubjectStudentService->checkPeriodActive($request),
            //$this->registerSubjectStudentService->checkPeriodSubjectMinMax($request),
            $this->registerSubjectStudentService->checkDebtsStudent($request),
            $this->registerSubjectStudentService->checkCapacityCourse($request),
            $this->registerSubjectStudentService->checkPrerequisitesAprobe($request),
            $this->registerSubjectStudentService->checkSubjectsFailed($request),
            $this->registerSubjectStudentService->checkCoursePeriodUnique($request,$coursestudent),
            $this->registerSubjectStudentService->checkHourhandUnique($request)
        );

        if($coursestudent === null)
            array_push($conditions,$this->registerSubjectStudentService->checkPeriodSubjectMinMax($request));

        $response = $this->formatValidationResponse($conditions);

        return $response ;
    }
}
