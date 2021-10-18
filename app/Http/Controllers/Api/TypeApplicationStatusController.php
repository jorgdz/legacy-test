<?php

namespace App\Http\Controllers\Api;

use App\Cache\TypeApplicationStatusCache;
use App\Http\Controllers\Api\Contracts\ITypeApplicationStatusController;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeApplicationStatusRequest;
use App\Models\Status;
use App\Models\TypeApplication;
use App\Models\TypeApplicationStatus;
use App\Models\TypeApplicationStatusRoles;
use App\Traits\RestResponse;
use Illuminate\Http\Request;

class TypeApplicationStatusController extends Controller implements ITypeApplicationStatusController
{
    use RestResponse;

    private $typeApplicationStatusCache;

    public function __construct(TypeApplicationStatusCache $typeApplicationStatusCache)
    {
        $this->typeApplicationStatusCache = $typeApplicationStatusCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeApplicationStatusCache->all($request));
    }
        
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(TypeApplicationStatusRequest $request)
    {
        $est = Status::findOrFail($request->status_id);
        
        if($est->categoryStatus->cat_name != 'Documentos'
        || $est->where('st_name', 'Rechazado')->first()->id == $request->status_id
        || $est->where('st_name', 'Enviado')->first()->id == $request->status_id)
            return $this->information(__('messages.status-not-available'));

        // Si la solicitud no tiene ningun estado, se creara automaticamente 
        // el estado rechazado cuando se intente crear el primer estado.
        // El estado rechazado siempre deberia tener order = 0.
        $v_tas = $this->typeApplicationStatusCache->validaStatus($request);
        if (!$v_tas->first()){
            $v_tas = $this->typeApplicationStatusCache->createDefaultStatus($request);
        }
        // Valida que la solicitud no posea ya ese estado.
        $v_tas = $this->typeApplicationStatusCache->validaStatus($request);
        if ($v_tas->where('status_id', $request->status_id)->first())
            return $this->information(__('messages.occuped-application-order'));
            
        // Se crea el orden de la solicitud.
        $v_tas = $this->typeApplicationStatusCache->validaStatus($request);
        $tas = new TypeApplicationStatus($request->all());
        $tas->order = $v_tas->orderBy('order', 'desc')->first()->order + 1;
        $tas->save();

        // Se proporcionan los roles enviados al orden creado.
        $tas->typeApplicationStatusRoles()->createMany($request->roles);

        return $this->success($tas);
    }
        
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->typeApplicationStatusCache->find($id));
    }
            
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $tas
     * @return void
     */
    public function update(TypeApplicationStatusRequest $request, TypeApplicationStatus $tas)
    {
        $est = Status::findOrFail($request->status_id);

        if($est->categoryStatus->cat_name != 'Documentos'/* 
        || $est->where('st_name', 'Rechazado')->first()->id == $request->status_id
        || $est->where('st_name', 'Enviado')->first()->id == $request->status_id */)
            return $this->information(__('messages.status-not-available'));
            
        // Se crea el orden de la solicitud.
        $v_tas = $this->typeApplicationStatusCache->validaStatus($request);
        if ($request->type_application_id != $tas->type_application_id) {
            if (!$v_tas->first()){
                $v_tas = $this->typeApplicationStatusCache->createDefaultStatus($request);
            }
            $tas->fill($request->all());
            $tas->order = $v_tas->orderBy('order', 'desc')->first()->order + 1;
        } else {
            $tas->fill($request->all());
        }
        
        // Se eliminan los roles anteriores y se proporcionan los roles enviados al orden creado.
        $tas->typeApplicationStatusRoles()->delete();
        $tas->typeApplicationStatusRoles()->createMany($request->roles);
        
        return $this->success($this->typeApplicationStatusCache->save($tas));
    }

    /**
     * destroy
     *
     * @param  mixed $tas
     * @return void
     */
    public function destroy(TypeApplicationStatus $tas)
    {
        $est = Status::findOrFail($tas->status_id);

        if($est->categoryStatus->cat_name != 'Documentos'
        || $est->where('st_name', 'Rechazado')->first()->id == $tas->status_id
        || $est->where('st_name', 'Enviado')->first()->id == $tas->status_id)
            return $this->information(__('messages.status-not-available'));
            
        return $this->success($this->typeApplicationStatusCache->destroy($tas));
    }
}
