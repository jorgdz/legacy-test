<?php

namespace App\Http\Controllers\Api;

use App\Cache\EducationLevelCache;
use App\Http\Controllers\Controller;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\IEducationLevelController;
use App\Http\Requests\EducationLevelFormRequest;
use App\Models\EducationLevel;
use Exception;

use Illuminate\Support\Facades\DB;

class EducationLevelController extends Controller implements IEducationLevelController
{
    use RestResponse;

    private $educationLevelCache;

    public function __construct(EducationLevelCache $educationLevelCache)
    {
        $this->educationLevelCache = $educationLevelCache;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->educationLevelCache->all($request));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationLevelFormRequest $request)
    {
        
        DB::beginTransaction();
        try {
            $el = new EducationLevel($request->all());
            $el = $this->educationLevelCache->save($el);

            DB::commit();
            return $this->success($el, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request  $request,$id)
    {
        return $this->success($this->educationLevelCache->find($id));
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EducationLevelFormRequest $request, EducationLevel $educationLevel)
    {
        DB::beginTransaction();
        try {
            $educationLevel->fill($request->all());
         
            if ($educationLevel->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->educationLevelCache->save($educationLevel);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationLevel $educationLevel)
    {
        
        DB::beginTransaction();
        try{
            $response = $this->educationLevelCache->destroy($educationLevel);
            DB::commit();
            return $this->success($response);
        }catch(Exception $ex){
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }


}