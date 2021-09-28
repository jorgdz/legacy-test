<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LearningComponent;
use Illuminate\Http\Request;
use App\Cache\LearningComponentCache;
use App\Cache\MeshCache;
use App\Cache\DetailMatterMeshCache;
use App\Traits\RestResponse;
use App\Http\Requests\LearningComponentFormRequest;
use App\Http\Requests\UpdateLearningComponentRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\ILearningComponentController;
use App\Models\MatterMesh;
use App\Models\Mesh;
use App\Exceptions\Custom\ConflictException;
use OpenApi\Annotations\Items;
use Illuminate\Support\Facades\DB;

class LearningComponentController extends Controller implements ILearningComponentController
{
    use RestResponse;

    /**
     * relativeCache
     *
     * @var mixed
     */
    private $learningComponentCache,$meshCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (LearningComponentCache $learningComponentCache,MeshCache $meshCache,DetailMatterMeshCache $detailMatterMeshCache) {
        $this->learningComponentCache = $learningComponentCache;
        $this->meshCache = $meshCache;
        $this->detailMatterMeshCache = $detailMatterMeshCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        return $this->success($this->learningComponentCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LearningComponentFormRequest $request)
    {
        $data = $this->learningComponentCache->checkIfExist($request->component_id,$request->mesh_id);

        if($data){
            LearningComponent::withTrashed()->find($data->id)->restore();
            $learningComponent = LearningComponent::findOrFail($data->id);
            $learningComponent->fill($request->all());
            $learningComponent->save();
            if(isset($learningComponent)){
                $this->detailMatterMeshCache->activateComponentsByMesh($learningComponent);
            }
            return $this->information(__('messages.success'));
        }

        if(!isset($request->lea_workload)){
            $sum = $this->learningComponentCache->calculateWorkLoad($request->mesh_id,$request->component_id);
            $request->merge(['lea_workload' => $sum]); 
        }    

        $component = new LearningComponent($request->all());
        $component = $this->learningComponentCache->save($component);    
        return $this->success($component, Response::HTTP_CREATED);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LearningComponent  $learningComponent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->learningComponentCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LearningComponent  $learningComponent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLearningComponentRequest $request, LearningComponent $learningcomponent)
    {
        if(!isset($request->lea_workload)){
            $sum = $this->learningComponentCache->calculateWorkLoad($request->mesh_id,$request->component_id);
            $request->merge(['lea_workload' => $sum]);
        }         

        $learningcomponent->fill($request->all());

        if ($learningcomponent->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->learningComponentCache->save($learningcomponent));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LearningComponent  $learningComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearningComponent $learningcomponent)
    {
        $wasPublished =  $this->meshCache->checkMeshPublished($learningcomponent->mesh_id);
        if($wasPublished)
            throw new ConflictException('El componente de aprendizaje esta asociado a una malla Publicada');

        $response = $this->learningComponentCache->destroy($learningcomponent);
        if(isset($response)){
           return $this->detailMatterMeshCache->deactivateComponentsByMesh($response);
        }
        return $this->success($response);
    }
}
