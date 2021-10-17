<?php

namespace App\Http\Controllers\Api;

use App\Cache\EducationLevelSubjectCache;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Api\Contracts\IGroupAreaSubjectController;
use App\Http\Controllers\Controller;
use App\Http\Requests\EducationLevelSubjectRequest;
use App\Models\GroupAreaSubject;
use App\Models\Subject;
use App\Traits\RestResponse;
use Illuminate\Http\Request;

class GroupAreaSubjectController extends Controller implements IGroupAreaSubjectController
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

        if($subject->typeMatter->tm_acronym == 'nv') {
            $educationLevelSubject = new GroupAreaSubject($request->all());

            $educationLevelFound = GroupAreaSubject::where('subject_id', $subject->id)
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
    public function update(EducationLevelSubjectRequest $request, GroupAreaSubject $groupAreaSubject)
    {
        $subject = Subject::findOrFail($request['subject_id']);

        if($subject->typeMatter->tm_acronym == 'nv') {

            $educationLevelSubjectFound = GroupAreaSubject::where('id', '!=', $groupAreaSubject->id)
                ->where('subject_id', $subject->id)
                ->where('group_nivelation_id', $groupAreaSubject->group_nivelation_id)
                ->first();

            if($educationLevelSubjectFound)
                throw new ConflictException(__('messages.subject-found-with-career'));

            $groupAreaSubject->fill($request->all());

            if ($groupAreaSubject->isClean())
                return $this->information(__('messages.nochange'));

            $this->educationLevelSubjectCache->save($groupAreaSubject);
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
    public function destroy(GroupAreaSubject $groupAreaSubject)
    {
        return $this->success($this->educationLevelSubjectCache->destroy($groupAreaSubject));
    }
}
