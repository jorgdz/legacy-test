<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use App\Cache\SubjectCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\ISubjectController;
use App\Models\EducationLevel;
use App\Models\SubjectCurriculum;
use Exception;

//class MatterController extends Controller implements IMatterController
class SubjectController extends Controller implements ISubjectController
{
    use RestResponse;

    private $subjectCache;

    public function __construct(SubjectCache $subjectCache) {
        $this->subjectCache = $subjectCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->subjectCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request) {
        $educationLevel = EducationLevel::findOrFail($request->education_level_id);

        if ($educationLevel->principal_id != null)
            throw new ConflictException(__('messages.error-saving-model', ['model' => class_basename(Subject::class)]));

        $subject = new Subject($request->all());
        $subject = $this->subjectCache->save($subject);

        return $this->success($subject, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->subjectCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubjectRequest $request, Subject $subject) {
        $educationLevel = EducationLevel::findOrFail($request->education_level_id);

        if ($educationLevel->principal_id != null)
            throw new ConflictException(__('messages.error-saving-model', ['model' => class_basename(Subject::class)]));

        $subject->fill($request->all());
        if ($subject->isClean())
            return $this->information(__('messages.nochange'));

        $response = $this->subjectCache->save($subject);

        return $this->success($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject) {
        if($subject->matterMesh->first())
            return $this->information(__('messages.error-dependency-model', ['model' => class_basename(Subject::class), 'model1' => class_basename(SubjectCurriculum::class)]), Response::HTTP_BAD_REQUEST);

        return $this->success($this->subjectCache->destroy($subject));
    }
}
