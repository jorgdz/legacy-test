<?php

namespace App\Http\Controllers\Api;

use App\Cache\ClassroomTypeCache;
use App\Http\Controllers\Api\Contracts\IClassroomTypeController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomTypeRequest;
use App\Models\ClassroomType;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassroomTypeController extends Controller implements IClassroomTypeController
{
    use RestResponse;

    private $classroomTypeCache;

    public function __construct(ClassroomTypeCache $classroomTypeCache)
    {
        $this->classroomTypeCache = $classroomTypeCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->classroomTypeCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClassroomTypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassroomTypeRequest $request)
    {
        $classroomType = new ClassroomType($request->all());
        return $this->success($this->classroomTypeCache->save($classroomType), Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->classroomTypeCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClassroomTypeRequest  $request
     * @param  \App\Models\ClassroomType  $classroomType
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomTypeRequest $request, ClassroomType $classroomType)
    {
        $classroomType->fill($request->all());

        if ($classroomType->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->classroomTypeCache->save($classroomType));
    }
}
