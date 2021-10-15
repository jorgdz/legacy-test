<?php

namespace App\Http\Controllers\Api;

use App\Cache\ApplicationCache;
use App\Http\Controllers\Api\Contracts\IApplicationController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\TransaccResource;
use App\Models\Application;
use App\Models\ApplicationDetail;
use App\Models\TransacTypeApplicationStatusRoles;
use App\Models\TypeApplication;
use App\Models\TypeApplicationStatus;
use App\Models\TypeApplicationStatusRoles;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller implements IApplicationController
{
    use RestResponse;

    private $applicationCache;

    public function __construct(ApplicationCache $applicationCache)
    {
        $this->applicationCache = $applicationCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->applicationCache->all($request));
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(ApplicationRequest $request)
    {
        // Si el tipo de solicitud seleccionado es un padre o si esta vacio no se admite
        $typeApp = TypeApplication::where('typ_app_acronym', $request->typ_app_acronym)->first();
        if (!$typeApp || !$typeApp->parent_id)
            return $this->information(__('messages.no-acronym'));

        // Se asigna automaticamente el estado "enviado" en caso de existir, sino, return
        $tas = TypeApplicationStatus::whereHas('status', fn ($query) => $query->where('st_name', '=', 'Enviado'))->where('type_application_id', $typeApp->id)->first();
        if (!$tas)
            return $this->information(__('messages.status-not-available'));
            
        // Comprueba que el usuario posea el rol para "enviar" una solicitud
        $tasRole = TypeApplicationStatusRoles::where('type_application_status_id', $tas->id)->where('role_id', $request->role_id)->first();
        if (!$tasRole)
            return $this->information(__('messages.status-change-is-not-allowed'));

        $application = new Application($request->all());
        // $application->app_code = str_pad($typeApp->id, 3, "0", STR_PAD_LEFT) . '-' . str_pad(Application::withTrashed()->count() + 1, 7, "0", STR_PAD_LEFT);
        $application->app_code = $typeApp->typ_app_acronym . '-' . str_pad(Application::withTrashed()->count() + 1, 7, "0", STR_PAD_LEFT);
        $application->type_application_id = $typeApp->id;
        $application->user_id = Auth::user()->id;
        $application->save();

        // Guarda los valores de los detalles de la solicitud
        $application->applicationDetail()->createMany($request->details);

        $trans_tas = new TransacTypeApplicationStatusRoles();
        $trans_tas->transac_secuencial = $application->app_code;
        $trans_tas->transac_comments = 'Nueva solicitud enviada por un usuario';
        $trans_tas->transac_register_date = date("Y-m-d");
        $trans_tas->user = Auth::user()->us_username;
        $trans_tas->type_application_status_roles_id = $tasRole->id;
        $trans_tas->status_id = 1;
        $trans_tas->save();

        return $this->success($application);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->applicationCache->find($id));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $application
     * @return void
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        if ($request->typ_app_acronym)
            return $this->information(__('messages.no-application-type-change'));

        return $this->success($this->applicationCache->save($application->fill($request->all())));
    }
    
    /**
     * destroy
     *
     * @param  mixed $application
     * @return void
     */
    public function destroy(Application $application)
    {
        //Se elimina la solicitud unicamente si esta en estado "enviado" actualmente
        $trans_tas = TransacTypeApplicationStatusRoles::where('transac_secuencial', $application->app_code)->orderBy('id', 'desc')->first();
        
        if (!$trans_tas || $trans_tas->typeApplicationStatusRoles->typeApplicationStatus->status->st_name != 'Enviado')
            return $this->information(__('messages.delete-application-error'));

        return $this->success($this->applicationCache->destroy($application));
    }
    
    /**
     * getAllApplicationStatus
     *
     * En realidad devuelve el registro de las trasacciones
     * en las que el usuario puede realizar un cambio segun su rol.
     * Regresa los datos de la solicitud dentro de cada transaccion.
     * 
     * @param  mixed $role
     * @return void
     */
    public function getAllApplicationStatus($role) {
        return $this->success($this->applicationCache->getAllApplicationStatus($role));
    }
    
    /**
     * showApplicationStatus
     *
     * Regresa el historial de una trasaccion especifica.
     * 
     * @param  mixed $id
     * @return void
     */
    public function showApplicationStatus($code) {
        return $this->success($this->applicationCache->showApplicationStatus($code));
    }
    
    /**
     * changeApplicationStatus
     *
     * Cambia el estado de la solicitud en la transaccion.
     * Se asignara automaticamente el estado siguiente en el orden a menos que
     * se rechace la solicitud.
     * 
     * @param  mixed $request
     * @return void
     */
    public function changeApplicationStatus(Request $request) {
        $request->validate([
            "app_code"  => "required|exists:tenant.applications,app_code",
            "role_id"   => "required|exists:tenant.roles,id",
            "comment"   => "required|string",
            "refused"   => "nullable|boolean",
        ]);

        return $this->success($this->applicationCache->changeApplicationStatus($request));
    }
}
