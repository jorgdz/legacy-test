<?php

namespace App\Http\Controllers\Api;

use App\Cache\SubjectCurriculumCache;
use App\Models\Curriculum;
use App\Cache\CurriculumCache;
use App\Exceptions\Custom\ConflictException;
use App\Traits\RestResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CurriculumRequest;
use App\Http\Controllers\Api\Contracts\ICurriculumController;
use App\Models\LearningComponent;

//class MeshsController extends Controller implements IMeshsController
class CurriculumController extends Controller implements ICurriculumController
{
    use RestResponse;

    private $curriculumCache;
    private $subjectCurriculumCache;

    public function __construct(CurriculumCache $curriculumCache, SubjectCurriculumCache $subjectCurriculumCache) {
        $this->curriculumCache = $curriculumCache;
        $this->subjectCurriculumCache = $subjectCurriculumCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->curriculumCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurriculumRequest $request) {
        $curriculumFound = Curriculum::where('status_id', 7)->where('level_edu_id', $request['level_edu_id'])->first();
        if($curriculumFound)
            throw new ConflictException(__('messages.meshs-vigent'));

        $curriculum = new Curriculum($request->except('components'));
        $curriculum = $this->curriculumCache->save($curriculum);
        if(isset($request['components']))
            $curriculum->learningComponent()->createMany($request['components']);

        return $this->success($curriculum, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        return $this->success($this->curriculumCache->find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CurriculumRequest $request, Curriculum $curriculum) {

        $curriculum->fill($request->except('components'));

        if ($curriculum->isClean() && !isset($request['components']))
            return $this->information(__('messages.nochange'));

        $plucked = $curriculum->learningComponent()->pluck('component_id');
        if(isset($request['components'])) {

            foreach($request['components'] as $learningComponent) {
                LearningComponent::withTrashed()->where('mesh_id', $curriculum->id)->where('component_id', $learningComponent['component_id'])->restore();
                $curriculum->learningComponent()->updateOrCreate([
                    'component_id' => $learningComponent['component_id']
                ]);
                $component_id[] = $learningComponent['component_id'];
            }
            $componentIdsWillBeDeleted = collect($plucked->diff($component_id)->values()->all());
            if(count($componentIdsWillBeDeleted) > 0) {
                foreach($componentIdsWillBeDeleted as $component) {
                    LearningComponent::where('mesh_id', $curriculum->id)->where('component_id', $component)->delete();
                }
            }

        }

        $response = $this->curriculumCache->save($curriculum);
        return $this->success($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curriculum $curriculum) {
        $response = $this->curriculumCache->destroy($curriculum);
        return $this->success($response);
    }

    /**
     * learningComponentByMesh
     *
     * @param  mixed $curriculum
     * @return void
     */
    public function learningComponentByMesh(Curriculum $curriculum)
    {
        return $this->success($this->curriculumCache->learningComponentByMesh($curriculum));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $mesh
     * @return \Illuminate\Http\Response
     */
    public function showMattersByMesh(Request $request, Curriculum $curriculum) {
        return $this->success($this->subjectCurriculumCache->findMatersbyMesh($request,$curriculum->id));
    }
}
