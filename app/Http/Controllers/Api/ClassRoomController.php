<?php

namespace App\Http\Controllers\Api;

use App\Cache\ClassRoomCache;
use App\Cache\CourseCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IClassRoomController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoomFormRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Exceptions\Custom\ConflictException;
use App\Models\ClassRoom;
use App\Traits\Auditor;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassRoomController extends Controller implements IClassRoomController
{
    use RestResponse, Auditor;

    private $classRoomCache,$courseCache;

    /**
     * __construct
     *
     * @param  mixed $companyCache
     * @return void
     */
    public function __construct(ClassRoomCache $classRoomCache, CourseCache $courseCache)
    {
        $this->classRoomCache = $classRoomCache;
        $this->courseCache = $courseCache;
    }

    public function index(Request $request)
    {
        return $this->success($this->classRoomCache->all($request));
    }

    public function store(ClassRoomFormRequest $request)
    {
        $classRoom = new ClassRoom($request->all());
        $classRoom = $this->classRoomCache->save($classRoom);
        return $this->success($classRoom, Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->classRoomCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassRoomRequest $request, ClassRoom $classroom)
    {
        $classroom->fill($request->all());

        if ($classroom->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->classRoomCache->save($classroom));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $classroom)
    {
        $courses = $this->courseCache->classroomHasCourses($classroom->id);
        if($courses >= 1)
            throw new ConflictException(__('messages.classroom-has-course'));

        $response = $this->classRoomCache->destroy($classroom);
        return $this->success($response);
    }

    /**
     * enabled
     *
     * @param  mixed $classroom
     * @return void
     */
    public function enabled(Classroom $classroom)
    {
        if($classroom->status_id == 1)
            return $this->information(__('messages.is-active'), Response::HTTP_UNPROCESSABLE_ENTITY);

        $classroom->status_id = 1;
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(ClassRoom::class)));
        return $this->success($this->classRoomCache->save($classroom));
    }

    /**
     * disabled
     *
     * @param  mixed $classroom
     * @return void
     */
    public function disabled(ClassRoom $classroom)
    {
        if($classroom->status_id == 2)
            return $this->information(__('messages.is-inactive'), Response::HTTP_UNPROCESSABLE_ENTITY);

        $classroom->status_id = 2;
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(ClassRoom::class)));
        return $this->success($this->classRoomCache->save($classroom));
    }
}
