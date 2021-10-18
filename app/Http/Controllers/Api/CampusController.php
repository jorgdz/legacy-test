<?php

namespace App\Http\Controllers\Api;

use App\Models\Campus;
use App\Cache\CampusCache;
use App\Cache\ClassRoomCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampusFormRequest;
use App\Http\Controllers\Api\Contracts\ICampusController;

/**
 * CampusController maintenance
 */
class CampusController extends Controller implements ICampusController
{
    use RestResponse;

    private $campusCache;
    private $classRoomCache;

    public function __construct(CampusCache $campusCache, ClassRoomCache $classRoomCache)
    {
        $this->classRoomCache = $classRoomCache;
        $this->campusCache = $campusCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->campusCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampusFormRequest $request)
    {
        $campus = new Campus($request->all());
        $campus = $this->campusCache->save($campus);
        return $this->success($campus, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->campusCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campus $campus)
    {
        $campus->fill($request->all());

        if ($campus->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->campusCache->save($campus));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        return $this->success($this->campusCache->destroy($campus));
    }

    /**
     * getClassromsByCampus
     *
     * @param  mixed $campus
     * @return void
     */
    public function getClassromsByCampus (Campus $campus) {
        //$id = $campus->id;
       /*  $conditionals = [
            ['classroom_type_id',$id ]
        ];
      
        return $this->success($this->classRoomCache->findByConditionals($conditionals)); */
       //return $this->success($this->campusCache->getClassromsByCampusCache($campus));

       
       return $this->success($this->classRoomCache->getClassromsByCampusCache($campus));

    }
}
