<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\RestResponse;
use Illuminate\Support\Facades\DB;
use App\Models\StudentRecordPeriod;
use App\Http\Controllers\Controller;
use App\Cache\StudentRecordPeriodCache;
use App\Http\Requests\StudentRecordPeriodRequest;
use App\Http\Controllers\Api\Contracts\IStudentRecordPeriodController;

class StudentRecordPeriodController extends Controller implements IStudentRecordPeriodController
{
    use RestResponse;

    private $studentRecordPeriodCache;

    public function __construct(StudentRecordPeriodCache $studentRecordPeriodCache) {
        $this->studentRecordPeriodCache = $studentRecordPeriodCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->studentRecordPeriodCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRecordPeriodRequest $request) {
        DB::beginTransaction();
        try {
            $studentRecordPeriod = new StudentRecordPeriod($request->all());
            $studentRecordPeriod = $this->studentRecordPeriodCache->save($studentRecordPeriod);

            DB::commit();
            return $this->success($studentRecordPeriod);
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
    public function show($id) {
        return $this->success($this->studentRecordPeriodCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentRecordPeriod  $studentRecordPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRecordPeriodRequest $request, StudentRecordPeriod $studentRecordPeriod) {
        DB::beginTransaction();
        try {
            $studentRecordPeriod->fill($request->all());

            if ($studentRecordPeriod->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->studentRecordPeriodCache->save($studentRecordPeriod);

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
     * @param  \App\Models\StudentRecordPeriod  $studentRecordPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentRecordPeriod $studentRecordPeriod) {
        DB::beginTransaction();
        try {
            $response = $this->studentRecordPeriodCache->destroy($studentRecordPeriod);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
