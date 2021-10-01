<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailSubjectCurriculum;
use App\Models\LearningComponent;
use Illuminate\Http\Request;
use App\Cache\DetailSubjectCurriculumCache;
use App\Cache\LearningComponentCache;
use App\Traits\RestResponse;
use App\Http\Requests\DetailSubjectCurriculumFormRequest;
use App\Http\Requests\UpdateDetailSubjectCurriculumRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\IDetailSubjectCurriculumController;
use App\Exceptions\Custom\NotFoundException;

//class DetailMatterMeshController extends Controller implements IDetailMatterMeshController
class DetailSubjectCurriculumController extends Controller implements IDetailSubjectCurriculumController
{
    use RestResponse;

    /**
     * relativeCache
     *
     * @var mixed
     */
    private $detailSubjectCurriculumCache,$learningComponentCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (DetailSubjectCurriculumCache $detailSubjectCurriculumCache,LearningComponentCache $learningComponentCache) {
        $this->detailSubjectCurriculumCache = $detailSubjectCurriculumCache;
        $this->learningComponentCache = $learningComponentCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        return $this->success($this->detailSubjectCurriculumCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailSubjectCurriculumFormRequest $request)
    {
        $component = $this->checkIfComponentExist($request);    
        if($component){  
            $data = $this->detailSubjectCurriculumCache->checkIfExist($request);

            if($data){
                DetailSubjectCurriculum::withTrashed()->find($data->id)->restore();
                $detailMatterMesh = DetailSubjectCurriculum::findOrFail($data->id);
                $detailMatterMesh->fill($request->all());
                $detailMatterMesh->save();
                $this->calculateMeshWorkLoad($request);

                return $this->information(__('messages.success'));
            }

            $detailMatterMesh = new DetailSubjectCurriculum($request->all());
            $detailMatterMesh = $this->detailSubjectCurriculumCache->save($detailMatterMesh);    
            $this->calculateMeshWorkLoad($request);

            return $this->success($detailMatterMesh, Response::HTTP_CREATED);   
        }else{
            throw new NotFoundException('El componente de aprendizaje no esta asociado a la malla');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailSubjectCurriculum  $detailMatterMesh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $this->success($this->detailSubjectCurriculumCache->find($id));
        return $this->success($this->detailSubjectCurriculumCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailSubjectCurriculum  $detailMatterMesh
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailSubjectCurriculumRequest $request, DetailSubjectCurriculum $detailsubjectcurriculum)
    {
        $component = $this->checkIfComponentExist($request);    
        if($component){  
            $detailsubjectcurriculum->fill($request->all());

            if ($detailsubjectcurriculum->isClean())
                return $this->information(__('messages.nochange'));

            $detailSubjectCurriculumCache = $this->detailSubjectCurriculumCache->save($detailsubjectcurriculum);
            
            $this->calculateMeshWorkLoad($request);

            return $this->success($detailSubjectCurriculumCache);
        }else{
            throw new NotFoundException('El componente de aprendizaje no esta asociado a la malla');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailSubjectCurriculum  $detailMatterMesh
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailSubjectCurriculum $detailsubjectcurriculum)
    {
        $detailMatterMesh = $this->detailSubjectCurriculumCache->destroy($detailsubjectcurriculum);
        $this->calculateMeshWorkLoad($detailsubjectcurriculum);
        return $this->success($detailMatterMesh);
    }

    /**
     * Calculate the total hours of components by Mesh
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function calculateMeshWorkLoad($request)
    {
        $mesh_id = $this->detailSubjectCurriculumCache->getMeshIdByMatterMesh($request->matter_mesh_id); 
        if(isset($mesh_id)){ 
            $sum = $this->learningComponentCache->calculateWorkLoad((int)$mesh_id,$request->components_id);
            $learningComponent = array(
                "mesh_id"      => (int)$mesh_id, 
                "component_id" => $request->components_id,
                "lea_workload" => $sum,
            );
            return $this->learningComponentCache->updateMeshWorkLoad($learningComponent);
        }      
        return false;
    }

    public  function checkIfComponentExist(Request $request)
    {
        $mesh_id   = $this->detailSubjectCurriculumCache->getMeshIdByMatterMesh($request->matter_mesh_id);        
        return $this->learningComponentCache->checkIfMeshComponentExist($request->components_id,$mesh_id);
    }
}
