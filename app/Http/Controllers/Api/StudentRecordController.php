<?php

namespace App\Http\Controllers\Api;

use App\Cache\StudentRecordCache;
use App\Cache\StudentRecordProgramsCache;
use App\Http\Controllers\Api\Contracts\IStudentRecordController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRecordRequest;
use App\Models\Collaborator;
use App\Models\StudentRecord;
use App\Models\StudentRecordProgram;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentRecordController extends Controller implements IStudentRecordController
{
    use RestResponse;

    /**
     * studentRecordCache
     *
     * @var mixed
     */
    private $studentRecordCache;

     /**
     * studentRecordProgramsCache
     *
     * @var mixed
     */
    private $studentRecordProgramsCache;
    /**
     * __construct
     *
     * @param  mixed $studentRecordCache
     * @return void
     */
    public function __construct(StudentRecordCache $studentRecordCache, StudentRecordProgramsCache $studentRecordProgramsCache)
    {
        $this->studentRecordCache = $studentRecordCache;
        $this->studentRecordProgramsCache = $studentRecordProgramsCache;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->studentRecordCache->all($request));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StudentRecordRequest $request)
    {
        $studentRecord = new StudentRecord($request->all());
        $collaboratorId = Collaborator::where('coll_advice', 1)->get('id')->random()->id;
        $studentRecord->collaborator_id = $collaboratorId;
        return $this->success($this->studentRecordCache->save($studentRecord), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->studentRecordCache->find($id));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $studentRecord
     * @return void
     */
    public function update(StudentRecordRequest $request, StudentRecord $studentRecord)
    {
        $studentRecord->fill($request->all());

        if ($studentRecord->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->studentRecordCache->save($studentRecord));
    }

    /**
     * destroy
     *
     * @param  mixed $studentRecord
     * @return void
     */
    public function destroy(StudentRecord $studentRecord)
    {
        return $this->success($this->studentRecordCache->destroy($studentRecord));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StudentRecordProgramAndTypeStudentPrograms(Request $request, StudentRecordProgram $studentRecordProgram)
    {

        $SudentRecordId = $studentRecordProgram->student_record_id;
        $request['conditions'] = [
            ['student_record_id', $SudentRecordId],
        ];

        return $this->success($this->studentRecordProgramsCache->all($request));
    }

}
