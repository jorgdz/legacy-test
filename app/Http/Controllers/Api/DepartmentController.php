<?php

namespace App\Http\Controllers\Api;

use App\Cache\DepartmentCache;
use App\Http\Controllers\Api\Contracts\IDepartmentController;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeparmentFormRequest;
use App\Models\Department;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller implements IDepartmentController
{

    use RestResponse;

    private $departmentCache;

    public function __construct(DepartmentCache $departmentCache)
    {
        $this->departmentCache = $departmentCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        
        $request['conditions'] = [
            ['parent_id', NULL]
           // ,['status_id',1] 
        ];
        return $this->success($this->departmentCache->all($request));
   
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeparmentFormRequest $request)
    {
        $department = new Department($request->all());
        $department = $this->departmentCache->save($department);

        return $this->success($department, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->departmentCache->find($id));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeparmentFormRequest $request, Department $department)
    {
        $department->fill($request->all());
        if ($department->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->departmentCache->save($department));
   
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(DeparmentFormRequest $request, Department $department)
    {

        $department->fill($request->all());
        if ($department->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->departmentCache->save($department));
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /*  public function destroy($id)
    {
        //
    } */
}
