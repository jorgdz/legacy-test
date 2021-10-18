<?php

namespace App\Repositories;

use App\Http\Resources\TransaccResource;
use App\Models\Application;
use App\Models\TransacTypeApplicationStatusRoles;
use App\Models\TypeApplicationStatus;
use App\Models\TypeApplicationStatusRoles;
use App\Repositories\Base\BaseRepository;
use App\Traits\RestResponse;
use Illuminate\Support\Facades\Auth;

/**
 * CampusRepository
 */
class ApplicationRepository extends BaseRepository
{
    use RestResponse;

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['typeApplication', 'applicationDetail', 'user', 'status'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status', 'type_applications', 'users'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['app_code', 'app_description'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'app_code',
        'app_description',
        'typ_app_name',
        'typ_app_description'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Application $application) {
        parent::__construct($application);
    }

    public function getAllApplicationStatus ($role) {
        $trans_tas = TransacTypeApplicationStatusRoles::whereHas('typeApplicationStatusRoles', fn ($query) => 
                            $query->where('role_id', $role)
                    )
                    /* ->whereHas('typeApplicationStatusRoles.typeApplicationStatus.status', fn ($query) 
                        => $query->where('st_name', '!=', 'Finalizado')
                    ) */
                    ->get();
                    
        if (!$trans_tas->first())
            return $this->information(__('messages.no-pending-applications'));

        return TransaccResource::collection($trans_tas);
    }

    public function showApplicationStatus ($code) {
        $transactions = TransacTypeApplicationStatusRoles::where('transac_secuencial', $code)->get();

        if (!$transactions->first())
            return $this->information(__('messages.no-pending-applications'));

        return TransaccResource::collection($transactions);
    }

    public function changeApplicationStatus ($request) {
        // Consulta el total de estados posibles en una solicitud.
        $tas_count = TypeApplicationStatus::whereHas('typeApplication', fn ($query) => 
            $query->whereHas('application', fn ($query) => 
                $query->where('app_code', $request->app_code)
                )
            )->get();

        /* 
        *  Toma el estado de la ultima transaccion realizada a una solicitud especifica.
        *  A demas solo se tomara la transaccion en la que el usuario con el role proporcionado
        *  pueda realizar el siguiente cambio de estado.
        */
        $trans_tas = TransacTypeApplicationStatusRoles::where('transac_secuencial', $request->app_code)->orderBy('id', 'desc')
                ->whereHas('typeApplicationStatusRoles', fn ($query) => 
                    $query->where('role_id', $request->role_id)
                );

        if (!$trans_tas->first()    //Issue menor al recibir un role sin el permiso (funciona correctamente pero muestra el msj equivocado).
            || $trans_tas->first()->typeApplicationStatusRoles->typeApplicationStatus->status->st_name == 'Finalizado'
            || $trans_tas->first()->typeApplicationStatusRoles->typeApplicationStatus->status->st_name == 'Rechazado'
            || $trans_tas->count() >= $tas_count->count() - 1)              // Si el historia de la solicitud es mayor o igual al total de posibles estados de la solicitud
            return $this->information(__('messages.finished_application'));

        
        if ($request->refused == 1) {           // Si se rechaza la solicitud
            // Consulta el orden valor 0 de estado que tomara la transaccion.
            $order = TypeApplicationStatus::where('order', 0)
            ->where('type_application_id', $trans_tas->first()->typeApplicationStatusRoles->typeApplicationStatus->type_application_id)
            ->first();
            
            if (!$order)
                return $this->information(__('messages.finished_application'));
        } else {
            // Consulta el siguiente orden de cambio de estado que tomara la transaccion.
            $order = TypeApplicationStatus::where('order', $trans_tas->first()->typeApplicationStatusRoles->typeApplicationStatus->order + 1)
                    ->where('type_application_id', $trans_tas->first()->typeApplicationStatusRoles->typeApplicationStatus->type_application_id)
                    ->first();

            if (!$order)
                return $this->information(__('messages.finished_application'));
        }
         
        // Valida que el usuario pueda cambiar el estado de la transaccion.
        $tasRole = TypeApplicationStatusRoles::where('role_id', $request->role_id)->where('type_application_status_id', $order->id)->first();

        if (!$tasRole)
            return $this->information(__('messages.status-change-is-not-allowed'));

        // Si se rechaza la solicitud
        if ($request->refused == 1) {
            $transac = TransacTypeApplicationStatusRoles::create([
                'transac_secuencial' => $trans_tas->first()->transac_secuencial,
                'transac_register_date' =>  date("Y-m-d"),
                'transac_comments' => $request->comment,
                'user' => Auth::user()->us_username,
                'type_application_status_roles_id' => $tasRole->id,
                'status_id' => $trans_tas->first()->status_id,
            ]);

            return $this->success(new TransaccResource($transac));
        }

        $transac = TransacTypeApplicationStatusRoles::create([
            'transac_secuencial' => $trans_tas->first()->transac_secuencial,
            'transac_register_date' =>  date("Y-m-d"),
            'transac_comments' => $request->comment,
            'user' => Auth::user()->us_username,
            'type_application_status_roles_id' => $tasRole->id,
            'status_id' => $trans_tas->first()->status_id,
        ]);
        
        return $this->success(new TransaccResource($transac));
    }
}
