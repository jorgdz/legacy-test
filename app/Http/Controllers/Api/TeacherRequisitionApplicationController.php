<?php

namespace App\Http\Controllers\Api;

use App\Cache\ApplicationCache;
use App\Cache\CollaboratorCache;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequisitionApplicationRequest;
use App\Models\Application;
use App\Models\Collaborator;
use App\Models\EducationLevel;
use App\Models\Hourhand;
use App\Models\Offer;
use App\Models\Period;
use App\Models\Position;
use App\Models\User;
use App\Repositories\CollaboratorRepository;
use App\Repositories\TypeApplicationRepository;
use App\Services\FilesystemService;
use App\Traits\RestResponse;
use App\Traits\TranslateException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherRequisitionApplicationController extends Controller
{
    use RestResponse, TranslateException;

    private $typeApplicationRepository, $instituteRepository, $curriculumRepository, $applicationCache, $collaboratorRepository, $filesystemService;

    /**
     * __construct
     *
     * @param  mixed $typeApplicationRepository
     * @return void
     */
    public function __construct(TypeApplicationRepository $typeApplicationRepository,  ApplicationCache $applicationCache, CollaboratorRepository $collaboratorRepository, FilesystemService $filesystemService)
    {
        $this->typeApplicationRepository = $typeApplicationRepository;
        $this->applicationCache = $applicationCache;
        $this->collaboratorRepository = $collaboratorRepository;
        $this->filesystemService = $filesystemService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequisitionApplicationRequest $request)
    {
        DB::beginTransaction();
        try {
            $conditionals = [
                ["typ_app_acronym", "REQDOC"],
                ["status_id", 1],
            ];
            $typeApplication = $this->typeApplicationRepository->findByConditionals($conditionals);

            if (!$typeApplication) throw new ConflictException(__('messages.no-exist-instance', ['model' => $this->translateNameModel(class_basename(TypeApplication::class))]));

            // $current_timestamp = \Carbon\Carbon::now();
            $response = [
                "app_description" => $request->app_description,
                "typ_app_acronym" => $typeApplication->typ_app_acronym,
                "app_register_date" => \Carbon\Carbon::now()->format("Y-m-d"),
                "details" => array(
                    ["config_type_application_id" => 9, "value" => $request->user_id],
                    ["config_type_application_id" => 10, "value" => json_encode($request->json[0])],
                    ["config_type_application_id" => 11, "value" => json_encode($request->json[1])],
                ),
                "role_id" => $request->role_id
            ];

            $application = new ApplicationController($this->applicationCache);
            $response = $application->store(new \App\Http\Requests\ApplicationRequest($response));
            $app_code = json_decode(json_encode($response))->original->app_code;
            // Genera el PDF al crear la solicitud
            $pdf = $this->pdfGen($request, $app_code, $request->user_id, 'Enviado', 0);

            DB::commit();
            return $pdf->stream();
            // return $response;
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
    
    /**
     * changeApplicationStatus
     *
     * @param  mixed $request
     * @return void
     */
    public function changeApplicationStatus(Request $request) {       
        // Cambia el estado de la solicitud 
        $application = new ApplicationController($this->applicationCache);
        $resp = json_decode(json_encode($application->changeApplicationStatus($request)));

        $app = Application::with('applicationDetail')->where('app_code', $request->app_code)->first();
        
        // Recorre los valores del detalle de la solicitud para convertilos
        // de texto plano a json.
        $data = [];
        foreach ($app->applicationDetail as $detail) {
            $data[] = json_decode($detail->value);
        }

        // Si ya no hay mas cambios de estado en la solicitud devolvera un error,
        // en ese caso se genera un pdf igualmente pero envio parametros desde
        // distintos sitios.
        if (isset($resp[0]->detail)) {
            $pdf = $this->pdfGen($data, $app->app_code, null, 'Finalizado', 1);
        } else {
            // Genera el PDF al crear la solicitud
            $pdf = $this->pdfGen($data, $app->app_code, null, $resp[0]->current_status, 1);
        }

        // Si la solicitud alcanza su ultimo estado, se creara un colaborador con los datos del detalle
        // de la solicitud.
        if ($resp[1]->finished) {
            if ($data[2]->tipo_dedicacion == "TC") {
                $position = Position::where('pos_keyword', 'docente-tm-completo')->first();
            }
            if ($data[2]->tipo_dedicacion == "MT") {
                $position = Position::where('pos_keyword', 'DOCT')->first();
            }
            if ($data[2]->tipo_dedicacion == "PA") {
                $position = Position::where('pos_keyword', 'docente-tm-completo')->first();
            }
            
            /* Se puede dar el caso en que se cree una solicitud a la cual se otorgo el email
                de colaborador ej:"phoppe@gmail.com", y aun sin finalizar esa solicitud
                se crea otra solicitud con ese mismo correo; cuando se finalice una de las
                solicitudes, se creara el colaborador, pero, cuando se finalice la
                siguiente solicitud y se intente crear al siguiente colaborador
                la DB arrojara una excepcion, pues el email estara duplicado
            */
            $coll = new Collaborator();
            $coll->user_id = $data[0];
            $coll->coll_email = $data[1]->coll_email;
            $coll->coll_type = "D";
            $coll->coll_activity = "DOCENCIA";
            $coll->coll_journey_description = $data[2]->tipo_dedicacion;
            $coll->coll_dependency = $data[2]->tipo_vinculacion;
            $coll->coll_advice = 0;
            $coll->position_company_id = $position->id;
            $coll->education_level_principal_id = $data[1]->education_level_id;
            $coll->status_id = 1;
    
            $collCache = new CollaboratorCache($this->collaboratorRepository);
            $collCache->save($coll);
            
            return $pdf->stream();
            // return $this->success($collCache->save($coll));
        }

        return $pdf->stream();
        // return $resp;
    }
    
    /**
     * pdfGen
     *
     * Genera un PDF al crear la solicitud y al cambiar su estado.
     * El cambio de estado deberia generear la solicitud con firmas adicionales.
     * (DEBERIA).
     * 
     * @param  mixed $request
     * @param  mixed $response
     * @return void
     */
    public function pdfGen($request, $app_code, $user_id, $app_status, $from) {
        if ($from == 0) {
            $data1 = json_decode(json_encode($request->json[0]));
            $data2 = json_decode(json_encode($request->json[1]));
        } else {
            $user_id = $request[0];
            $data1 = $request[1];
            $data2 = $request[2];
        }

        $user = User::findOrFail($user_id);
        $user1 = User::findOrFail($data1->user_id_requisition);
        $facultad = EducationLevel::findOrFail($data1->education_level_id);
        $period = Period::findOrFail($data1->period_id);
        $offer = Offer::findOrFail($data1->offer_id);
        $hourhand = Hourhand::findOrFail($data1->hourhand_id);
        
        $relacion_dep = $data2->tipo_vinculacion == 1 ? 'Servicios Profesionales' : 'Relacion de Dependencia';
        if ($data2->tipo_dedicacion == 'TC') {
            $dedication = 'Tiempo Completo';
        }
        if ($data2->tipo_dedicacion == 'MT') {
            $dedication = 'Medio Tiempo';
        }
        if ($data2->tipo_dedicacion == 'PA') {
            $dedication = 'PARCIAL';
        }

        $params = [
            // "logo" => $this->filesystemService->getURLStorage(CustomTenant::current()->logo_path),
            "applicationStatus" => $app_status,
            "faculty" => $facultad->edu_name,
            "fullname" => "{$user1->person->pers_firstname} {$user1->person->pers_first_lastname}",
            "ced" => $user1->person->pers_identification,
            "application" => $app_code,
            "current_date" => \Carbon\Carbon::now()->locale('es')->translatedFormat('l j F Y'),
            "emit" => "{$user->person->pers_firstname} {$user->person->pers_first_lastname}",
            "period" => $period->per_name,
            "offer" => $offer->off_name,
            "hourhand" => $hourhand->hour_description,
            "dependency" => $relacion_dep,
            "dedication" => $dedication,
            "personJobs" => $user->person->personJob
        ];

        return \PDF::loadView('applications/teacher-requisition', $params);
    }
}
