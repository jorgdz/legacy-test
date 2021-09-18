<?php

namespace App\Http\Controllers\Api;

use App\Cache\TypeStudentProgramCache;
use App\Http\Controllers\Api\Contracts\ITypeStudentProgramsController;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeStudentProgramFormRequest;
use App\Models\TypeStudentProgram;
use Illuminate\Http\Request;


use App\Traits\RestResponse;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class TypeStudentProgramsController extends Controller implements ITypeStudentProgramsController
{

    use RestResponse;

    private $typeStudentProgramCache;

    public function __construct(TypeStudentProgramCache $typeStudentProgramCache)
    {
        $this->typeStudentProgramCache = $typeStudentProgramCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeStudentProgramCache->all($request));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeStudentProgramFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $typeStdProg= new TypeStudentProgram($request->all());
            $typeStdProg = $this->typeStudentProgramCache->save($typeStdProg);

            DB::commit();
            return $this->success($typeStdProg, Response::HTTP_CREATED);
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
        return $this->success($this->typeStudentProgramCache->find($id));
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeStudentProgramFormRequest $request, TypeStudentProgram $typeStudentProgram)
    {
        DB::beginTransaction();
        try {
            $typeStudentProgram->fill($request->all());
         
            if ($typeStudentProgram->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->typeStudentProgramCache->save($typeStudentProgram);

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
    public function destroy(TypeStudentProgram $typeStudentProgram)
    {
        DB::beginTransaction();
        try{
            $response = $this->typeStudentProgramCache->destroy($typeStudentProgram);
            DB::commit();
            return $this->success($response);
        }catch(Exception $ex){
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
