<?php

namespace App\Http\Controllers\Api;

use App\Cache\DetailSubjectCurriculumCache;
use App\Cache\LearningComponentCache;
use App\Cache\SubjectCurriculumCache;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Api\Contracts\ISubjectCurriculumController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectCurriculumDependenciesRequest;
use App\Http\Requests\SubjectCurriculumRequest;
use App\Http\Requests\UpdateMatterMeshRequest;
use App\Models\Curriculum;
use App\Models\DetailSubjectCurriculum;
use App\Models\SubjectCurriculum;
use App\Repositories\CurriculumRepository;
use App\Traits\Auditor;
use App\Traits\RestResponse;
use App\Traits\TranslateException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectCurriculumController extends Controller implements ISubjectCurriculumController
{
    use RestResponse, TranslateException, Auditor;

    /**
     * subjectCurriculumCache
     *
     * @var mixed
     */
    private $subjectCurriculumCache;
    private $learningComponentCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (
        SubjectCurriculumCache $subjectCurriculumCache,
        LearningComponentCache $learningComponentCache
        )
    {

        $this->subjectCurriculumCache = $subjectCurriculumCache;
        $this->learningComponentCache = $learningComponentCache;

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

            $subjectCurriculum = SubjectCurriculum::findOrFail($data->id);
            $subjectCurriculum->fill($request->all());
            $subjectCurriculum->save();

            Curriculum::findOrFail($subjectCurriculum->mesh_id)->increment('mes_number_matter');

            return $this->success($subjectCurriculum);
        }

        $matterMeshFound = SubjectCurriculum::where('matter_id', $request->matter_id)->where('mesh_id', $request->mesh_id)->first();

        if($matterMeshFound)
            throw new ConflictException(__('messages.exist-instance', ['model' => $this->translateNameModel(class_basename(SubjectCurriculum::class))]));

        $subjectCurriculum = new SubjectCurriculum($request->except('components'));
        $subjectCurriculum = $this->subjectCurriculumCache->save($subjectCurriculum);
        $subjectCurriculum->matterMeshPrerequisites()->sync($request['prerequisites'], false);

        if($subjectCurriculum)
            Curriculum::findOrFail($subjectCurriculum->mesh_id)->increment('mes_number_matter');

        $meshId = $subjectCurriculum->mesh->id;

        foreach($request['components'] as $component) {
            DetailSubjectCurriculum::create([
                'matter_mesh_id' => $subjectCurriculum->id,
                'components_id' => $component['components_id'],
                'dem_workload' => $component['lea_workload'],
                'status_id' => 1
            ]);
            $this->calculateMeshWorkLoad($meshId, $component['components_id']);
        }

        return $this->success($subjectCurriculum);
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

        $subjectcurriculum->fill($request->except('components'));

        if ($subjectcurriculum->isClean() && !isset($request['components']) && !isset($request['prerequisites']))
            return $this->information(__('messages.nochange'));

        $subjectCurriculum = $this->subjectCurriculumCache->save($subjectcurriculum);
        $subjectCurriculum->matterMeshPrerequisites()->sync($request['prerequisites']);
        $meshId = $subjectCurriculum->mesh->id;

        $plucked = $subjectcurriculum->detailMatterMesh()->pluck('components_id');
        if(isset($request['components'])) {
            $subjectcurriculum->detailMatterMesh()->delete();

            foreach($request['components'] as $learningComponent) {
                DetailSubjectCurriculum::withTrashed()->where('matter_mesh_id', $subjectCurriculum->id)->where('components_id', $learningComponent['components_id'])->restore();

                $subjectCurriculum->detailMatterMesh()->updateOrCreate([
                    'components_id' => $learningComponent['components_id'],
                    'dem_workload' => $learningComponent['lea_workload'],
                    'status_id' => 1
                ]);

                $component_id[] = $learningComponent['components_id'];
                $this->calculateMeshWorkLoad($meshId, $learningComponent['components_id']);
            }

            $componentIdsWillBeDeleted = collect($plucked->diff($component_id)->values()->all());

            if(count($componentIdsWillBeDeleted) > 0) {
                foreach($componentIdsWillBeDeleted as $component) {
                    DetailSubjectCurriculum::where('matter_mesh_id', $subjectCurriculum->id)->where('components_id', $component)->delete();
                    $this->calculateMeshWorkLoad($meshId, $component);
                }
            }
        }
        return $this->success($subjectcurriculum);
    }

    /**
     * Calculate the total hours of components by Mesh
     *
     * @param  int $meshId
     * @param int $componentId
     * @return mixed|false
     */
    private function calculateMeshWorkLoad(int $meshId, int $componentId)
    {
        if(isset($meshId)){
            $sum = $this->calculateWorkLoad($meshId,$componentId);
            $learningComponent = array(
                "mesh_id"      => $meshId,
                "component_id" => $componentId,
                "lea_workload" => $sum,
            );
            return $this->learningComponentCache->updateMeshWorkLoad($learningComponent);
        }
        return false;
    }

    /**
     * calculateWorkLoad
     *
     * @param  mixed $meshId
     * @param  mixed $componentId
     * @return int
     */
    private function calculateWorkLoad(int $meshId, int $componentId) : int
    {
        $sum =  SubjectCurriculum::selectRaw('ISNULL(SUM(d.dem_workload),0) as total')
                ->where([
                    ['subject_curriculum.mesh_id',$meshId],
                    ['d.components_id',$componentId],
                ])->whereNull('subject_curriculum.deleted_at')->whereNull('d.deleted_at')->join('detail_subject_curriculum as d','subject_curriculum.id', '=', 'd.matter_mesh_id')
                ->first();

        return $sum->total;
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
        $subjectcurriculum->matterMeshPrerequisites()->detach();
        $components = $subjectcurriculum->detailMatterMesh()->pluck('components_id');
        foreach($components as $component) {
            DetailSubjectCurriculum::where('matter_mesh_id', $subjectcurriculum->id)->where('components_id', $component)->delete();
            $this->calculateMeshWorkLoad($subjectcurriculum->mesh->id, $component);
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
