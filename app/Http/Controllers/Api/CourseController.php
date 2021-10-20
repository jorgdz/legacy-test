<?php

namespace App\Http\Controllers\Api;

use App\Cache\CourseCache;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\ICourseController;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Exceptions\Custom\NotFoundException;
use App\Models\ClassRoom;
use App\Models\Subject;
use App\Traits\Auditor;

class CourseController extends Controller implements ICourseController
{

    use RestResponse, Auditor;

     /**
     * courseCache
     *
     * @var mixed
     */
    private $courseCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (CourseCache $courseCache) {
        $this->courseCache = $courseCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->courseCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $exists = $this->courseCache->validateCourseUnique($request);
        if(isset($exists))
            throw new NotFoundException(__('messages.courses-exists'));

        $course = new Course($request->all());
        $course = $this->courseCache->save($course);

        if(!empty($request->collaborators_support)){
            $collaborators = $this->courseCache->getCollaboratorsInCourse($request);
            if(empty($collaborators))
                throw new NotFoundException(__('messages.courses-exists'));

            $courses = [];
            //foreach ($request->collaborators as $collaborator)
            foreach ($collaborators as $collaborator)
            {
                $model = [
                    "max_capacity"    => $request->max_capacity,
                    "num_fouls"       => $request->num_fouls,
                    "start_date"      => $request->start_date,
                    "end_date"        => $request->end_date,
                    "matter_id"       => $request->matter_id,
                    "parallel_id"     => $request->parallel_id,
                    "classroom_id"    => $request->classroom_id,
                    "modality_id"     => $request->modality_id,
                    "hourhand_id"     => $request->hourhand_id,
                    "collaborator_id" => $collaborator,
                    "period_id"       => $request->period_id,
                    "status_id"       => $request->status_id,
                ];
                array_push($courses,$model);
            }
            $course = $this->courseCache->saveMultiple($courses);
            //return $this->information(__('messages.success'));
        }
        return $this->information(__('messages.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->courseCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $exists = $this->courseCache->validateCourseUnique($request,$course->id);
        if(isset($exists))
            throw new NotFoundException(__('messages.courses-exists'));

        $course->fill($request->all());

        if ($course->isClean())
            return $this->information(__('messages.nochange'));

        $response = $this->courseCache->save($course);
        return $this->success($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        return $this->success($this->courseCache->destroy($course));
    }


    public function changeStatus(Request $request, $id)
    {
        return $this->success($this->courseCache->changeStatus($id,$request->status_id));
        //return true;
    }
}
