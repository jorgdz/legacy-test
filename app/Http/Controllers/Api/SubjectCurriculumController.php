<?php

namespace App\Http\Controllers\Api;

use App\Cache\SubjectCurriculumCache;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Api\Contracts\ISubjectCurriculumController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectCurriculumDependenciesRequest;
use App\Http\Requests\SubjectCurriculumRequest;
use App\Http\Requests\UpdateMatterMeshRequest;
use App\Models\Curriculum;
use App\Models\SubjectCurriculum;
use App\Repositories\CurriculumRepository;
use App\Traits\Auditor;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectCurriculumController extends Controller implements ISubjectCurriculumController
{
    use RestResponse, Auditor;

    /**
     * subjectCurriculumCache
     *
     * @var mixed
     */
    private $subjectCurriculumCache;
    private $curriculumRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (SubjectCurriculumCache $subjectCurriculumCache, CurriculumRepository $curriculumRepository) {
        $this->subjectCurriculumCache = $subjectCurriculumCache;
        $this->curriculumRepository  = $curriculumRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->subjectCurriculumCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectCurriculumRequest $request) {
        /*$conditionals = [
            ['id', $request->mesh_id]
        ];
        
        $meshs = $this->curriculumRepository->findByConditionals($conditionals);
        
        if (!$meshs) {
            throw new ConflictException(__('messages.no-exist-instance-resource'));
        } elseif (count($meshs['matter_mesh']) >= $meshs['mes_number_matter']) {
            throw new ConflictException(__('messages.max', ['max' => $meshs['mes_number_matter']]));
        }*/

        $data = DB::connection('tenant')->table('subject_curriculum')
                ->whereNotNull('deleted_at')
                ->where('matter_id', $request->matter_id)
                ->where('mesh_id', $request->mesh_id)
                ->first();

        if ($data) {
            SubjectCurriculum::withTrashed()->find($data->id)->restore();

            $subjectcurriculum = SubjectCurriculum::findOrFail($data->id);
            $subjectcurriculum->fill($request->all());
            $subjectcurriculum->save();

            Curriculum::findOrFail($subjectcurriculum->mesh_id)->increment('mes_number_matter');

            return $this->success($subjectcurriculum);
        }

        $matterMeshFound = SubjectCurriculum::where('matter_id', $request->matter_id)->where('mesh_id', $request->mesh_id)->first();

        if($matterMeshFound) {
            throw new ConflictException(__('messages.exist-instance'));
        }

        $subjectcurriculum = new SubjectCurriculum($request->all());
        $subjectcurriculum = $this->subjectCurriculumCache->save($subjectcurriculum);

        if($subjectcurriculum) {
            Curriculum::findOrFail($subjectcurriculum->mesh_id)->increment('mes_number_matter');
        }

        return $this->success($subjectcurriculum);
    }

    /**
     * asignDependencies
     *
     * @param  mixed $request
     * @param  mixed $mattermesh
     * @return void
     */
    public function asignDependencies(SubjectCurriculumDependenciesRequest $request, SubjectCurriculum $subjectcurriculum) {
        $subjectcurriculum->matterMeshDependencies()->sync($request->matterMesh);
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(SubjectCurriculum::class)));
        return $this->success($this->subjectCurriculumCache->save($subjectcurriculum));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->subjectCurriculumCache->find($id));
    }

    /**
     * showDependencies
     *
     * @param  mixed $mattermesh
     * @return void
     */
    public function showDependencies(SubjectCurriculum $subjectcurriculum) {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(SubjectCurriculum::class)));
        return $this->success($this->subjectCurriculumCache->showDependencies($subjectcurriculum));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubjectCurriculumRequest  $request
     * @param  mixed  $mattermesh
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectCurriculumRequest $request, SubjectCurriculum $subjectcurriculum) {

        $subjectcurriculum->fill($request->all());

        if ($subjectcurriculum->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->subjectCurriculumCache->save($subjectcurriculum));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectCurriculum $subjectcurriculum) {
        $curriculum = Curriculum::findOrFail($subjectcurriculum->mesh_id);

        if($curriculum->mes_number_matter > 0) {
            $curriculum->decrement('mes_number_matter');
        }
        return $this->success($this->subjectCurriculumCache->destroy($subjectcurriculum));
    }

    /**
     * restoreSubjectRepository
     *
     * @param  mixed $mattermesh
     * @return void
     */
    public function restoreSubjectRepository(Request $request, $id) {
        $matterMesh =SubjectCurriculum::withTrashed()->findOrFail($id);
        $matterMesh->restore();
        Curriculum::findOrFail($matterMesh->mesh_id)->increment('mes_number_matter');
        //return $this->information(__('messages.success'));
        return $this->success($this->subjectCurriculumCache->save($matterMesh));
    }

    /**
     * show Prerequisites matter mesh
     *
     * @param  mixed $mattermesh
     * @return void
     */
    public function showPrerequisites(SubjectCurriculum $subjectcurriculum) 
    {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(SubjectCurriculum::class)));
        return $this->success($this->subjectCurriculumCache->showPrerequisites($subjectcurriculum));
    }
}
