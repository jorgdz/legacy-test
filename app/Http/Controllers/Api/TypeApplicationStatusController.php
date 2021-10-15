<?php

namespace App\Http\Controllers\Api;

use App\Cache\TypeApplicationStatusCache;
use App\Http\Controllers\Api\Contracts\ITypeApplicationStatusController;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeApplicationStatusRequest;
use App\Models\Status;
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

        if($est->categoryStatus->cat_name != 'Documentos')
            return $this->information(__('messages.status-not-available'));

        // Si la solicitud no tiene ningun estado, se creara automaticamente 
        // el estado rechazado cuando se intente crear el primer estado.
        // El estado rechazado siempre deberia tener order = 0.
        $tas = TypeApplicationStatus::where('type_application_id', $request->type_application_id)->first();

        if (!$tas)
            $tas = new TypeApplicationStatus();
            $tas->order = 0;
            $tas->type_application_id = $request->type_application_id;
            $tas->status_id = Status::where('st_name', 'Rechazado')->first();
            $tas->save();

        $validaEst = TypeApplicationStatus::withTrashed()
            ->where('type_application_id', $request->type_application_id)
            ->where('status_id', $request->status_id)
            ->first();
            
        if ($validaEst){
            $validaEst->deleted_at != null ? $validaEst->restore() : null;

            $validaOrder = TypeApplicationStatus::where('type_application_id', $validaEst->type_application_id)
            ->where('order', $request->order)
            ->first();
        
            if ($validaOrder){
                $validaOrder->order = $validaEst->order;
                $validaOrder->save();
            }

            $validaEst->order = $request->order;

            $validaEst->save();

            $tasRoles = new TypeApplicationStatusRoles();

            $tasRoles->type_application_status_id = $validaEst->id;
            $tasRoles->role_id = $request->role_id;
            $tasRoles->status_id = 1;

            $tasRoles->save();

            return $this->success($validaEst);
        }

        $tas = new TypeApplicationStatus($request->all());
        $tas->save();

        $tasRoles = new TypeApplicationStatusRoles();

        $tasRoles->type_application_status_id = $tas->id;
        $tasRoles->role_id = $request->role_id;
        $tasRoles->status_id = 1;

        $tasRoles->save();

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

        if($est->categoryStatus->cat_name != 'Documentos')
            return $this->information(__('messages.status-not-available'));

        $validaEst = TypeApplicationStatus::withTrashed()
            ->where('type_application_id', $request->type_application_id)
            ->where('status_id', $request->status_id)
            ->first();
            
        if ($validaEst){
            if ($tas->id != $validaEst->id) {
                $validaEst->deleted_at != null ? $validaEst->restore() : null;

                $validaEst->order = $tas->order;
                $validaEst->type_application_id = $tas->type_application_id;
                $validaEst->status_id = $tas->status_id;

                $validaEst->save();
            }
            

            return $this->success($this->typeApplicationStatusCache->save($tas->fill($request->all())));
        }
        
        return $this->success($this->typeApplicationStatusCache->save($tas->fill($request->all())));
    }

    /**
     * destroy
     *
     * @param  mixed $tas
     * @return void
     */
    public function destroy(TypeApplicationStatus $tas)
    {
        return $this->success($this->typeApplicationStatusCache->destroy($tas));
    }
}
