<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailMatterMesh;
use App\Models\LearningComponent;
use Illuminate\Http\Request;
use App\Cache\DetailMatterMeshCache;
use App\Cache\LearningComponentCache;
use App\Traits\RestResponse;
use App\Http\Requests\DetailMatterMeshFormRequest;
use App\Http\Requests\UpdateDetailMatterMeshRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\IDetailMatterMeshController;
use App\Exceptions\Custom\NotFoundException;

class DetailMatterMeshController extends Controller implements IDetailMatterMeshController
{
    use RestResponse;

    /**
     * relativeCache
     *
     * @var mixed
     */
    private $detailMatterMeshCache,$learningComponentCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (DetailMatterMeshCache $detailMatterMeshCache,LearningComponentCache $learningComponentCache) {
        $this->detailMatterMeshCache = $detailMatterMeshCache;
        $this->learningComponentCache = $learningComponentCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        return $this->success($this->detailMatterMeshCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailMatterMeshFormRequest $request)
    {
        $component = $this->checkIfComponentExist($request);    
        if($component){  
            $data = $this->detailMatterMeshCache->checkIfExist($request);

            if($data){
                DetailMatterMesh::withTrashed()->find($data->id)->restore();
                $detailMatterMesh = DetailMatterMesh::findOrFail($data->id);
                $detailMatterMesh->fill($request->all());
                $detailMatterMesh->save();
                $this->calculateMeshWorkLoad($request);

                return $this->information(__('messages.success'));
            }

            $detailMatterMesh = new DetailMatterMesh($request->all());
            $detailMatterMesh = $this->detailMatterMeshCache->save($detailMatterMesh);    
            $this->calculateMeshWorkLoad($request);

            return $this->success($detailMatterMesh, Response::HTTP_CREATED);   
        }else{
            throw new NotFoundException('El componente de aprendizaje no esta asociado a la malla');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailMatterMesh  $detailMatterMesh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $this->success($this->detailMatterMeshCache->find($id));
        return $this->success($this->detailMatterMeshCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailMatterMesh  $detailMatterMesh
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailMatterMeshRequest $request, DetailMatterMesh $detailmattermesh)
    {
        $component = $this->checkIfComponentExist($request);    
        if($component){  
            $detailmattermesh->fill($request->all());

            if ($detailmattermesh->isClean())
                return $this->information(__('messages.nochange'));

            $detailMatterMeshCache = $this->detailMatterMeshCache->save($detailmattermesh);
            
            $this->calculateMeshWorkLoad($request);

            return $this->success($detailMatterMeshCache);
        }else{
            throw new NotFoundException('El componente de aprendizaje no esta asociado a la malla');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailMatterMesh  $detailMatterMesh
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailMatterMesh $detailmattermesh)
    {
        $detailMatterMesh = $this->detailMatterMeshCache->destroy($detailmattermesh);
        $this->calculateMeshWorkLoad($detailmattermesh);
        return $this->success($detailMatterMesh);
    }

    /**
     * Calculate the total hours of components by Mesh
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function calculateMeshWorkLoad($request)
    {
        $mesh_id = $this->detailMatterMeshCache->getMeshIdByMatterMesh($request->matter_mesh_id); 
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
        $mesh_id   = $this->detailMatterMeshCache->getMeshIdByMatterMesh($request->matter_mesh_id);        
        return $this->learningComponentCache->checkIfMeshComponentExist($request->components_id,$mesh_id);
    }
}
