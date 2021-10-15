<?php

namespace App\Http\Controllers\Api;

use App\Cache\EducationLevelSubjectCache;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Api\Contracts\IEducationLevelSubjectController;
use App\Http\Controllers\Controller;
use App\Http\Requests\EducationLevelSubjectRequest;
use App\Models\Catalog;
use App\Models\EducationLevel;
use App\Models\EducationLevelSubject;
use App\Models\Subject;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EducationLevelSubjectController extends Controller implements IEducationLevelSubjectController
{
    use RestResponse;

    private $educationLevelSubjectCache;

    /**
     * __construct
     *
     * @param  mixed $companyCache
     * @return void
     */
    public function __construct(EducationLevelSubjectCache $educationLevelSubjectCache)
    {
        $this->educationLevelSubjectCache = $educationLevelSubjectCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->educationLevelSubjectCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EducationLevelSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EducationLevelSubjectRequest $request)
    {
        $subject = Subject::findOrFail($request['subject_id']);
        $educationLevel = EducationLevel::where('id', $request['education_level_id'])->whereRelation('meshs', function($query) {
            $query->where('status_id', 7);
        })->first();

        if(!$educationLevel)
            throw new ConflictException(__('messages.career-not-found'));

        if($subject->typeMatter->tm_acronym == 'nv') {
            $educationLevelSubject = new EducationLevelSubject($request->all());

            $educationLevelFound = EducationLevelSubject::where('education_level_id', $educationLevel->id)
                ->where('subject_id', $subject->id)
                ->where('group_nivelation_id', $educationLevelSubject->group_nivelation_id)->first();

            if($educationLevelFound)
                throw new ConflictException(__('messages.subject-found-with-career'));

            $this->educationLevelSubjectCache->save($educationLevelSubject);
            return $this->information(__('messages.success'));
        }

        throw new ConflictException(__('messages.type-subject-not-nivelation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->educationLevelSubjectCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EducationLevelSubjectRequest  $request
     * @param  \App\Models\EducationLevelSubject  $educationLevelSubject
     * @return \Illuminate\Http\Response
     */
    public function update(EducationLevelSubjectRequest $request, EducationLevelSubject $educationLevelSubject)
    {
        $subject = Subject::findOrFail($request['subject_id']);
        $educationLevel = EducationLevel::where('id', $request['education_level_id'])->whereRelation('meshs', function($query) {
            $query->where('status_id', 7);
        })->first();

        if(!$educationLevel)
            throw new ConflictException(__('messages.career-not-found'));

        if($subject->typeMatter->tm_acronym == 'nv') {

            $educationLevelSubjectFound = EducationLevelSubject::where('id', '!=', $educationLevelSubject->id)
                ->where('education_level_id', $educationLevel->id)
                ->where('subject_id', $subject->id)
                ->where('group_nivelation_id', $educationLevelSubject->group_nivelation_id)
                ->first();

            if($educationLevelSubjectFound)
                throw new ConflictException(__('messages.subject-found-with-career'));

            $educationLevelSubject->fill($request->all());
            
            if ($educationLevelSubject->isClean())
                return $this->information(__('messages.nochange'));

            $this->educationLevelSubjectCache->save($educationLevelSubject);
            return $this->information(__('messages.success'));
        }

        throw new ConflictException(__('messages.type-subject-not-nivelation'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationLevelSubject  $educationLevelSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationLevelSubject $educationLevelSubject)
    {
        return $this->success($this->educationLevelSubjectCache->destroy($educationLevelSubject));
    }
}
