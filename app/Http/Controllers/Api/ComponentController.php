<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\LearningComponent;
use Illuminate\Http\Request;
use App\Cache\ComponentCache;
use App\Cache\CurriculumCache;
use App\Traits\RestResponse;
use App\Http\Requests\ComponentFormRequest;
use App\Http\Requests\UpdateComponentRequest;
use Illuminate\Http\Response;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Api\Contracts\IComponentController;

class ComponentController extends Controller implements IComponentController
{
    use RestResponse;

    /**
     * relativeCache
     *
     * @var mixed
     */
    private $componentCache,$meshCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (ComponentCache $componentCache, CurriculumCache $meshCache) {
        $this->componentCache = $componentCache;
        $this->meshCache = $meshCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        return $this->success($this->componentCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComponentFormRequest $request)
    {
        $data = $this->componentCache->checkIfExist($request);
        if($data){
            Component::withTrashed()->find($data->id)->restore();
            $component = Component::findOrFail($data->id);
            $component->fill($request->all());
            $component->save();

            return $this->information(__('messages.success'));
        }
            $component = new Component($request->all());
            $component = $this->componentCache->save($component);    
            return $this->success($component, Response::HTTP_CREATED);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->componentCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComponentRequest $request, Component $component)
    {
        $component->fill($request->all());

        if ($component->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->componentCache->save($component));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component)
    {
        $exist = $this->meshCache->checkComponentInMeshsPublished($component->id);
        if($exist)
            throw new ConflictException('El componente de aprendizaje esta asociado a una malla');

        return $this->success($this->componentCache->destroy($component));
        
    }
}
