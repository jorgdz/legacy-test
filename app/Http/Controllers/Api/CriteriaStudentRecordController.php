<?php

namespace App\Http\Controllers\Api;

use App\Cache\CriteriaStudentRecordCache;
use App\Http\Controllers\Controller;
use App\Http\Requests\CriteriaStudentRecordRequest;
use App\Models\CriteriaStudentRecord;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CriteriaStudentRecordController extends Controller
{
    use RestResponse;

    private $criteriaStudentRecordCache;

    /**
     * __construct
     *
     * @param  mixed $criteriaStudentRecordCache
     * @return void
     */
    public function __construct(CriteriaStudentRecordCache $criteriaStudentRecordCache)
    {
        $this->criteriaStudentRecordCache = $criteriaStudentRecordCache;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->criteriaStudentRecordCache->all($request));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(CriteriaStudentRecordRequest $request)
    {
        $criteriaStudentRecord = new CriteriaStudentRecord($request->all());
        return $this->success($this->criteriaStudentRecordCache->save($criteriaStudentRecord), Response::HTTP_CREATED);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->criteriaStudentRecordCache->find($id));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $criteriaStudentRecord
     * @return void
     */
    public function update(CriteriaStudentRecordRequest $request, CriteriaStudentRecord $criteriaStudentRecord)
    {
        $criteriaStudentRecord->fill($request->all());

        if($criteriaStudentRecord->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->criteriaStudentRecordCache->save($criteriaStudentRecord));
    }

    /**
     * destroy
     *
     * @param  mixed $criteriaStudentRecord
     * @return void
     */
    public function destroy(CriteriaStudentRecord $criteriaStudentRecord)
    {
        return $this->success($this->criteriaStudentRecordCache->destroy($criteriaStudentRecord));
    }
}
