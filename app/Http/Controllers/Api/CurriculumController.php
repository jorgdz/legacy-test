<?php

namespace App\Http\Controllers\Api;

use App\Cache\SubjectCurriculumCache;
use App\Models\Curriculum;
use App\Cache\CurriculumCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Traits\RestResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CurriculumRequest;
use App\Exceptions\Custom\ConflictException;
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
        DB::beginTransaction();
        try {
            $curriculum = new Curriculum($request->all());
            $curriculum = $this->curriculumCache->save($curriculum);

            DB::commit();
            return $this->success($curriculum, Response::HTTP_CREATED);
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
        DB::beginTransaction();
        try {
            $curriculum->fill($request->all());

            if ($curriculum->isClean())
                return $this->information(__('messages.nochange'));

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
        DB::beginTransaction();
        try {
            $response = $this->curriculumCache->destroy($curriculum);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());

        }
    }

    public function learningComponentByMesh(Curriculum $curriculum)
    {   
        return $this->success(Curriculum::with('learningComponent.component')->find($curriculum->id));
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
