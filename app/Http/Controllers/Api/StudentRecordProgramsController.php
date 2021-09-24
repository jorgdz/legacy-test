<?php

namespace App\Http\Controllers\Api;

use App\Cache\StudentRecordProgramsCache;
use App\Exceptions\Custom\StudentRecordProgramRequestException;
use App\Http\Controllers\Api\Contracts\IStudentRecordProgramsController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRecordProgramFormRequest;
use App\Models\StudentRecord;
use App\Models\StudentRecordProgram;
use App\Traits\RestResponse;
use App\Traits\ValidationStudentRecordPrograms;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StudentRecordProgramsController extends Controller implements IStudentRecordProgramsController
{

    use RestResponse, ValidationStudentRecordPrograms;

    private $studentRecordProgramsCache;

    public function __construct(StudentRecordProgramsCache $studentRecordProgramsCache)
    {
        $this->studentRecordProgramsCache = $studentRecordProgramsCache;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->studentRecordProgramsCache->all($request));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRecordProgramFormRequest $request)
    {
        DB::beginTransaction();
        try {


            if (!$this->validationStudentRecordProgramsStore($request))
                throw new StudentRecordProgramRequestException(__("messages.error-student-record-programs"));

            $stdRecPro = new StudentRecordProgram($request->all());
            $stdRecPro = $this->studentRecordProgramsCache->save($stdRecPro);

            DB::commit();
            return $this->success($stdRecPro, Response::HTTP_CREATED);
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
        return $this->success($this->studentRecordProgramsCache->find($id));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRecordProgramFormRequest $request, StudentRecordProgram $studentRecordProgram)
    {
        DB::beginTransaction();
        try {
            $studentRecordProgram->fill($request->all());

            if ($studentRecordProgram->isClean())
                return $this->information(__('messages.nochange'));


            if (!$this->validationStudentRecordProgramsUpdate($request, $studentRecordProgram))
                throw new StudentRecordProgramRequestException(__("messages.error-student-record-programs"));

            $response = $this->studentRecordProgramsCache->save($studentRecordProgram);

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
    public function destroy(StudentRecordProgram $studentRecordProgram)
    {
        DB::beginTransaction();
        try {
            $response = $this->studentRecordProgramsCache->destroy($studentRecordProgram);
            DB::commit();
            return $this->success($response);
        } catch (Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    public function listStudentRecordProgramAndTypeStudentPrograms(Request $request, StudentRecordProgram $studentRecordProgram)
    {
        return $this->success($this->studentRecordProgramsCache->allTypeStudentPrograms($request, $studentRecordProgram));
    }
}
