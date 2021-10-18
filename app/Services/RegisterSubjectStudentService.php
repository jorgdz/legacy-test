<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use App\Models\Period;
use App\Models\Stage;
use App\Models\Course;
use App\Models\PeriodStage;
use App\Models\StudentRecord;
use App\Exceptions\Custom\NotFoundException;
use App\Models\CourseStudent;
use App\Models\Curriculum;
use App\Models\Hourhand;
use App\Models\Status;
use App\Models\SubjectCurriculum;
use Carbon\Carbon;

class RegisterSubjectStudentService
{
    /* VALIDACIONES */
    // 1) No tener valores pendientes
    // 2) No haber reprobado la materia por cualquier causa más de 2 veces.(parametrizar en las configuraciones el n° veces a permitir reprobación)
    // 3) Cumplir con los prerrequisitos de las materias
    // 4) Cumplir con los requisitos del periodo (min-máximo de materias)
    // 5) La etapa de registro de materias en el periodo debe estar activa
    // 6) Debe haber cupo en la materia a registrarse


    public function checkDebtsStudent()
    {
        $response = true;
        return $response;
    }


     /**
     * 2) checkSubjectsFailed
     *
     * This Method is used to check the number of times that can fail a subject
     * 
     * @param  mixed $request
     * @return true
     */
    public function checkSubjectsFailed($request)
    {
        $statusInCourse = $this->getApprovalStatusId(6,'Reprobado');

        $maxNumberSubjectFailed = Curriculum::where('id',$request->curriculum_id)->first(); 
        if($maxNumberSubjectFailed->max_number_failed_subject  == '0')
            return __('messages.number-fail-subject');
          
        $numberSubjectReprobed = CourseStudent::join('courses as c', 'c.id', '=', 'course_student.course_id')
                                              ->where('course_student.student_record_id',$request->student_record_id)
                                              ->where('approval_status',$statusInCourse)
                                              ->where('c.matter_id',$request->subject_id)
                                              ->count();  
                      
        if(!isset($numberSubjectReprobed))
            return __('messages.subject-curriculum-not-found');

        if($numberSubjectReprobed >= 3)
            return "Ha reprobado el maximo numero de veces la materia";

        return true;        
    }

        
    /**
     * 3) checkPrerequisitesAprobe
     *
     * This Method is used to check the subjects prerequistes was aprrobed
     * 
     * @param  mixed $request
     * @return true
     */
    public function checkPrerequisitesAprobe($request)
    {

        $subjectPrerequisite =  SubjectCurriculum::where([
                                    ['matter_id',$request->subject_id],
                                    ['mesh_id',$request->curriculum_id]
                                ])
                                ->with('matterMeshPrerequisites')
                                ->first();

        if(!isset($subjectPrerequisite))
            return __('messages.subject-curriculum-not-found');


        if($subjectPrerequisite->matterMeshPrerequisites()->exists() === false)
            return true;

        $statusInCourse = $this->getApprovalStatusId(6,'Aprobado');    

        $subjects = [];
        foreach($subjectPrerequisite->matterMeshPrerequisites as $value){
            array_push($subjects,$value->matter_id);
        }
        
        $subjectAprobed = CourseStudent::join('courses as c', 'c.id', '=', 'course_student.course_id')
                                        ->where('course_student.student_record_id',$request->student_record_id)
                                        ->whereIn('c.matter_id', $subjects)
                                        ->pluck('approval_status')
                                        ->toArray();

        if(count(array_unique($subjectAprobed)) === 1){
            $valuesUnique = array_unique($subjectAprobed);
            if($valuesUnique[0] != $statusInCourse)
                return __('messages.subject-prerequisite-failed');
            
            return true;
        }else{
            return __('messages.subject-prerequisite-failed');
        }
    }


    /**
     * 4) checkPeriodSubjectMinMax
     * 
     * This Method is used to check the minimun and maximun number of subject to register in the period
     *
     * @param  mixed $request
     * @return true
     */
    public function checkPeriodSubjectMinMax($request)
    {
        $period = Period::where('id',$request->period_id)->first();
        if(!isset($period->id))
            return __('messages.period-not-found');

        $statusInCourse = $this->getApprovalStatusId(6,'Cursando');

        //If is the First Subject of the Student in the period return true
        $isFirstSubject = CourseStudent::where([
                            ['student_record_id',$request->student_record_id],
                            ['period_id',$request->period_id],
                            ['approval_status',$statusInCourse]
                        ])
                        ->whereNotNull('course_id')
                        ->count();

        if($isFirstSubject == 0)
            return true;
     
        $subjects = DB::table('course_student')
                    ->whereNull('course_student.deleted_at')
                    ->where([
                        ['course_student.student_record_id', $request->student_record_id],
                        ['c.period_id', $request->period_id],
                        ['course_student.approval_status',$statusInCourse]
                    ])
                    ->join('courses as c','course_student.course_id', '=', 'c.id')
                    ->count();

        if($subjects >= $period->per_min_matter_enrollment && $subjects < $period->per_max_matter_enrollment){
            return true;
        }else{
            return 'El periodo permite el registro de mínimo '.$period->per_min_matter_enrollment.' y máximo '.$period->per_max_matter_enrollment.' materias' ;
        }
    }

    /**
     * 5) checkPeriodActive
     * 
     * This Method is used to check if a Period have the register Stage is active
     *
     * @param  mixed $request
     * @return true
     */
    public function checkPeriodActive($request)
    {       
        $stage = Stage::where('stg_acronym','M')->first();
        if(!isset($stage->id))
            return __('messages.stage-period-error');

        $periodStage = PeriodStage::where('period_id',$request->period_id)->where('stage_id',$stage->id)->first();
        if(!isset($periodStage->id))
            return __('messages.periodo-active-error');

        return true;
    }


    /**
     * 6) checkCapacityCourse
     *
     * This Method is used to check the capicity of the course
     * 
     * @param  mixed $request
     * @return true
     */
    public function checkCapacityCourse($request)
    {
        $course = Course::where('id',$request->course_id)->first();
        if(!isset($course->id))
            return __('messages.course-not-found');

        $statusInCourse = $this->getApprovalStatusId(6,'Cursando');

        $studentsRegistered = DB::table('course_student')
                              ->whereNull('deleted_at')
                              ->where([
                                  ['course_id',$request->course_id],
                                  ['period_id',$request->period_id],
                                  ['approval_status',$statusInCourse]
                              ])->whereNotNull('course_id')
                              ->count();

        if($studentsRegistered < $course->max_capacity)
            return  true;                

        return __('messages.capacity-course');
    }
    

    /**
     * checkCoursePeriodUnique
     *
     * This Method is used to check that not exist a same data from CourseStudent by StudentRecord
     * 
     * @param  mixed $request
     * @return void
     */
    public function checkCoursePeriodUnique($request,$coursestudentID = null)
    {

        $conditions = [
            ['course_id',$request->course_id],
            ['student_record_id',$request->student_record_id],
            ['period_id',$request->period_id]
        ];

        if($coursestudentID !== null)
            array_push($conditions,['id','<>',$coursestudentID]);
        
        $courseStudent = CourseStudent::where(            
                            $conditions
                        )->whereNull('deleted_at')
                        ->count();

        if($courseStudent >= 1)
            return __('messages.coursestudent-not-unique');

        return true;
    }

    
    /**
     * checkHourhandUnique
     * 
     * This Method is used to check that not exist a course student with the same hourhands in a determinade period 
     *
     * @param  mixed $request
     * @return true
     */
    public function checkHourhandUnique($request)
    {

        $course = Course::where('id',$request->course_id)->whereNull('deleted_at')->first();
        if(!isset($course->id))
            return __('messages.course-not-found');

        $hourhandsDay = Hourhand::where('id',$course->hourhand_id)->whereNull('deleted_at')->first(); 

        
        $hourhandsToCheck = [
            "monday"    => ["haveClass" => $hourhandsDay->hour_monday,"hourStart" => $hourhandsDay->hour_start_time_monday,"hourEnd" => $hourhandsDay->hour_end_time_monday],
            "tuesday"   => ["haveClass" => $hourhandsDay->hour_tuesday,"hourStart" => $hourhandsDay->hour_start_time_tuesday,"hourEnd" => $hourhandsDay->hour_end_time_tuesday],
            "wednesday" => ["haveClass" => $hourhandsDay->hour_wednesday,"hourStart" => $hourhandsDay->hour_start_time_wednesday,"hourEnd" => $hourhandsDay->hour_end_time_wednesday],
            "thursday"  => ["haveClass" => $hourhandsDay->hour_thursday,"hourStart" => $hourhandsDay->hour_start_time_thursday,"hourEnd" => $hourhandsDay->hour_end_time_thursday],
            "friday"    => ["haveClass" => $hourhandsDay->hour_friday,"hourStart" => $hourhandsDay->hour_start_time_friday,"hourEnd" => $hourhandsDay->hour_end_time_friday],
            "saturday"  => ["haveClass" => $hourhandsDay->hour_saturday,"hourStart" => $hourhandsDay->hour_start_time_saturday,"hourEnd" => $hourhandsDay->hour_end_time_saturday],
            "sunday"    => ["haveClass" => $hourhandsDay->hour_sunday,"hourStart" => $hourhandsDay->hour_start_time_sunday,"hourEnd" => $hourhandsDay->hour_end_time_sunday]
        ];

        //return $hourhandsToCheck;
        $statusInCourse = $this->getApprovalStatusId(6,'Cursando');

        $courseRegisterd = DB::table('course_student')
                                        ->select('h.*')
                                        ->whereNull('course_student.deleted_at')
                                        ->where([
                                            ['course_student.student_record_id', $request->student_record_id],
                                            ['c.period_id', $request->period_id],
                                            ['course_student.approval_status',$statusInCourse]
                                        ])
                                        ->join('courses as c','course_student.course_id', '=', 'c.id')
                                        ->join('hourhands as h','c.hourhand_id', '=', 'h.id')
                                        ->get()
                                        ->toArray();
              
        //return $courseRegisterd;
        //First Course
        if(empty($courseRegisterd))      
            return true;

        for($i = 0; $i < count($courseRegisterd); ++$i) 
        {
            if($courseRegisterd[$i]->hour_monday == "1" && $hourhandsToCheck['monday']['haveClass'] == 1){
                //dd(1);
                return $this->valideteRangeHours($hourhandsToCheck['monday']['hourStart'],$hourhandsToCheck['monday']['hourEnd'],$courseRegisterd[$i]->hour_start_time_monday,$courseRegisterd[$i]->hour_end_time_monday);
            }
            if($courseRegisterd[$i]->hour_tuesday == "1" && $hourhandsToCheck['tuesday']['haveClass'] == 1){
                //dd(2);
                return $this->valideteRangeHours($hourhandsToCheck['tuesday']['hourStart'],$hourhandsToCheck['tuesday']['hourEnd'],$courseRegisterd[$i]->hour_start_time_monday,$courseRegisterd[$i]->hour_end_time_monday);
            }
            if($courseRegisterd[$i]->hour_wednesday == "1" && $hourhandsToCheck['wednesday']['haveClass'] == 1){
                //dd(3);
                return $this->valideteRangeHours($hourhandsToCheck['wednesday']['hourStart'],$hourhandsToCheck['wednesday']['hourEnd'],$courseRegisterd[$i]->hour_start_time_monday,$courseRegisterd[$i]->hour_end_time_monday);
            }
            if($courseRegisterd[$i]->hour_thursday == "1" && $hourhandsToCheck['thursday']['haveClass'] == 1){
                //dd(4);
                return $this->valideteRangeHours($hourhandsToCheck['thursday']['hourStart'],$hourhandsToCheck['thursday']['hourEnd'],$courseRegisterd[$i]->hour_start_time_monday,$courseRegisterd[$i]->hour_end_time_monday);
            }
            if($courseRegisterd[$i]->hour_friday == "1" && $hourhandsToCheck['friday']['haveClass'] == 1){
               // dd(5);
                return $this->valideteRangeHours($hourhandsToCheck['friday']['hourStart'],$hourhandsToCheck['friday']['hourEnd'],$courseRegisterd[$i]->hour_start_time_monday,$courseRegisterd[$i]->hour_end_time_monday);
            }
            if($courseRegisterd[$i]->hour_saturday == "1" && $hourhandsToCheck['saturday']['haveClass'] == 1){
                //dd(6);
                return $this->valideteRangeHours($hourhandsToCheck['saturday']['hourStart'],$hourhandsToCheck['saturday']['hourEnd'],$courseRegisterd[$i]->hour_start_time_monday,$courseRegisterd[$i]->hour_end_time_monday);
            }
            if($courseRegisterd[$i]->hour_sunday == "1" && $hourhandsToCheck['sunday']['haveClass'] == 1){
                //dd(7);
                return $this->valideteRangeHours($hourhandsToCheck['sunday']['hourStart'],$hourhandsToCheck['sunday']['hourEnd'],$courseRegisterd[$i]->hour_start_time_monday,$courseRegisterd[$i]->hour_end_time_monday);
            }
        }

        return 'El horario no es valido';
    }


    /**
     * valideteRangeHours
     * 
     * This Method is used to check range of hours of the classroom
     *
     * @param  string $frontCheck : Hour Start to check
     * @param  string $endCheck : Hour end to check
     * @param  string $from : Hour Start
     * @param  string $to : Hour End
     * @return true
     */
    public function valideteRangeHours($frontCheck,$endCheck,$from,$to)
    {
        if (strtotime($frontCheck) >= strtotime($from) && strtotime($frontCheck) < strtotime($to))
            return "Tiene un curso registrado con ese horario";

        if (strtotime($endCheck) > strtotime($from) && strtotime($endCheck) <= strtotime($to))
            return "Tiene un curso registrado con ese horario";
        
        return true;
    }


    /**
     * getApprovalStatusId
     * 
     * This Method is used to get the Id of the Approval Status
     *
     * @param  interger $category : Id Category
     * @param  string $status : Name Starus
     * @return true
     */
    public function getApprovalStatusId($category,$status){
        $status= Status::where([
                        ['st_name',$status],
                        ['category_status_id',$category]
                    ])->first();

        if(!isset($status->id))
            return __('messages.status-not-available');

        return $status->id;
    }
}