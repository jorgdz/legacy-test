<?php

namespace App\Http\Controllers\Api;

use App\Cache\ClassRoomCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IClassRoomController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoomFormRequest;
use App\Models\ClassRoom;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassRoomController extends Controller implements IClassRoomController
{
    use RestResponse;

    private $classRoomCache;

    /**
     * __construct
     *
     * @param  mixed $companyCache
     * @return void
     */
    public function __construct(ClassRoomCache $classRoomCache)
    {
        $this->classRoomCache = $classRoomCache;
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
    public function update(Request $request, ClassRoom $classroom)
    {
        $classroom->fill($request->all());

        if ($classroom->isClean())
            throw new UnprocessableException(__('messages.nochange'));

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
        return $this->success($this->classRoomCache->destroy($classroom));
    }
}
