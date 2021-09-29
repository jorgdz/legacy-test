<?php

namespace App\Http\Controllers\Api;

use App\Cache\CalificationModelCache;
use App\Http\Controllers\Api\Contracts\ICalificationModelController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CalificationModelFormRequest;
use App\Models\CalificationModel;
use Illuminate\Http\Request;
use App\Traits\RestResponse;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CalificationModelController extends Controller implements ICalificationModelController
{

    use RestResponse;

    private $calificationModelCache;

    public function __construct(CalificationModelCache $calificationModelCache)
    {
        $this->calificationModelCache = $calificationModelCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->calificationModelCache->all($request));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalificationModelFormRequest $request)
    {
        DB::beginTransaction();
      
        try {
            $typeDoc= new CalificationModel($request->all());
            $typeDoc = $this->calificationModelCache->save($typeDoc);

            DB::commit();
            return $this->success($typeDoc, Response::HTTP_CREATED);
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
    public function show($id)
    {
        return $this->success($this->calificationModelCache->find($id));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalificationModelFormRequest $request, CalificationModel $calificationModel)
    {
        DB::beginTransaction();
        try {
            $calificationModel->fill($request->all());
     
            if ($calificationModel->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->calificationModelCache->save($calificationModel);

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
    public function destroy(CalificationModel $calificationModel)
    {
        DB::beginTransaction();
        try{
            $response = $this->calificationModelCache->destroy($calificationModel);
            DB::commit();
            return $this->success($response);
        }catch(Exception $ex){
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
