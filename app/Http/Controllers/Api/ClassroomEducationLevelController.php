<?php

namespace App\Http\Controllers\Api;

use App\Cache\ClassroomEducationLevelCache;
use App\Http\Controllers\Controller;
use App\Models\ClassroomEducationLevel;
use App\Http\Requests\ClassroomEducationLevelRequest;
use App\Http\Requests\UpdateClassroomEducationLevelRequest;
use Illuminate\Http\Request;
use App\Traits\RestResponse;
use App\Exceptions\Custom\NotFoundException;
use App\Traits\Auditor;
use App\Http\Controllers\Api\Contracts\IClassroomEducationLevelController;
use App\Models\EducationLevel;

class ClassroomEducationLevelController extends Controller implements IClassroomEducationLevelController
{
    use RestResponse, Auditor;

    /**
     * subjectCurriculumCache
     *
     * @var mixed
     */
    private $classroomEducationLevelCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ClassroomEducationLevelCache $classroomEducationLevelCache) {
        $this->classroomEducationLevelCache = $classroomEducationLevelCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->classroomEducationLevelCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomEducationLevelRequest $request)
    {    
        //return $this->classroomEducationLevelCache->getClassroomAssigned($request);
        //Validar que no este asignada a otro facultad
        
        $isFacultad = EducationLevel::whereNull('principal_id')->find($request->education_level_id);
        if(!isset($isFacultad))
            throw new NotFoundException(__("No existe la facultad"));

        $classrooms = $this->classroomEducationLevelCache->getClassroomAssigned($request);
        //$classrooms = $this->classroomEducationLevelCache->validateRegister($request);
        if(!is_array($classrooms->classrooms_asiggned))
            throw new NotFoundException(__("messages.no-content"));

        $classroomLists = [];
        foreach ($classrooms->classrooms_asiggned as $classRoom)
        {
            $model = [
                "classroom_id"        => $classRoom,
                "period_id"           => $request->period_id,
                "education_level_id"  => $request->education_level_id,
                "status_id"           => $request->status_id,
            ];
            array_push($classroomLists,$model);
        }
        $this->classroomEducationLevelCache->saveMultiple($classroomLists);
        return  $this->success($classrooms);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassroomEducationLevel  $classroomEducationLevel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->classroomEducationLevelCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassroomEducationLevel  $classroomEducationLevel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassroomEducationLevelRequest $request, ClassroomEducationLevel $classroomeducationlevel)
    {
        $isFacultad = EducationLevel::whereNull('principal_id')->find($request->education_level_id);
        if(!isset($isFacultad))
            throw new NotFoundException(__("No existe la facultad"));

        $classroomeducationlevel->fill($request->all());

        if ($classroomeducationlevel->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->classroomEducationLevelCache->save($classroomeducationlevel));       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassroomEducationLevel  $classroomEducationLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassroomEducationLevel $classroomeducationlevel)
    {
        return $this->success($this->classroomEducationLevelCache->destroy($classroomeducationlevel));
    }

    public function changeStatus(Request $request, $id) 
    {
        return $this->success($this->classroomEducationLevelCache->changeStatus($id,$request->status_id));
    }
}
