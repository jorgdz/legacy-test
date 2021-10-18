<?php

namespace App\Http\Controllers\Api;

use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\ApplicationCache;
use Illuminate\Support\Facades\DB;
use App\Traits\TranslateException;
use App\Http\Controllers\Controller;
use App\Repositories\CurriculumRepository;
use App\Repositories\InstituteRepository;
use App\Exceptions\Custom\ConflictException;
use App\Repositories\TypeApplicationRepository;

class ExternalHomologationApplicationController extends Controller
{
    use RestResponse, TranslateException;

    private $typeApplicationRepository, $instituteRepository, $curriculumRepository, $applicationCache;

    /**
     * __construct
     *
     * @param  mixed $typeApplicationRepository
     * @return void
     */
    public function __construct(TypeApplicationRepository $typeApplicationRepository, InstituteRepository $instituteRepository, CurriculumRepository $curriculumRepository, ApplicationCache $applicationCache)
    {
        $this->instituteRepository = $instituteRepository;
        $this->curriculumRepository = $curriculumRepository;
        $this->typeApplicationRepository = $typeApplicationRepository;
        $this->applicationCache = $applicationCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $conditionals = [
                ["typ_app_acronym", "HOMEXT"],
                ["status_id", 1],
            ];
            $typeApplication = $this->typeApplicationRepository->findByConditionals($conditionals);

            if (!$typeApplication) throw new ConflictException(__('messages.no-exist-instance', ['model' => $this->translateNameModel(class_basename(TypeApplication::class))]));

            $curriculum = $this->curriculumRepository->find($request->level_education_id);
            $institute = $this->instituteRepository->find($request->institute_id);

            $number_homologate = $curriculum->mes_quantity_external_matter_homologate;
            if ($institute->has_agreement) {
                /* TODO: Validar el tema del numero de materias a homologar por convenio */
                $number_homologate = 0;
            }

            if (count($request->subjects_homologate) > $number_homologate) throw new ConflictException(__('messages.max-subjects-homologation', ['max' => $number_homologate]));

            $current_timestamp = \Carbon\Carbon::now();
            $response = [
                "app_description" => $request->app_description,
                "typ_app_acronym" => $typeApplication->typ_app_acronym,
                "app_register_date" => $current_timestamp->format("Y-m-d"),
                "details" => array(
                    ["config_type_application_id" => 2, "value" => $request->institute_id],
                    ["config_type_application_id" => 3, "value" => $curriculum->id],
                    ["config_type_application_id" => 4, "value" => $request->person_id],
                    ["config_type_application_id" => 5, "value" => json_encode($request->subjects_homologate)],
                ),
                "role_id" => $request->role_id,
                "status_id" => 1,
            ];

            /* dd($current_timestamp->locale('es')->translatedFormat('l j F Y'), $current_timestamp->format("Y-m-d")); */

            $application = new ApplicationController($this->applicationCache);
            $response = $application->store(new \App\Http\Requests\ApplicationRequest($response));
            DB::commit();

            return $response;
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
