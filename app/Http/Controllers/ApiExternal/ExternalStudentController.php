<?php

namespace App\Http\Controllers\ApiExternal;

use App\Cache\StudentCache;
use App\Cache\StudentDocumentCache;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\DatabaseException;
use App\Http\Controllers\ApiExternal\Contracts\IExternalStudentController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Catalog;
use App\Models\CustomTenant;
use App\Models\EducationLevel;
use App\Models\Student;
use App\Models\StudentDocument;
use App\Models\StudentRecord;
use App\Models\TypeDocument;
use App\Models\User;
use App\Services\FilesystemService;
use App\Services\MailService;
use App\Traits\Helper;
use App\Traits\RestResponse;
use App\Traits\SavePerson;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExternalStudentController extends Controller implements IExternalStudentController
{

    use RestResponse, Helper, SavePerson;

    /**
     * mailService
     *
     * @var mixed
     */
    private $mailService;
    private $filesystem;
    private $studentDocumentCache;

    /**
     * __construct
     *
     * @param  mixed $mailService
     * @return void
     */
    public function __construct(MailService $mailService, FilesystemService $filesystem, StudentDocumentCache $studentDocumentCache)
    {
        $this->mailService = $mailService;
        $this->filesystem = $filesystem;
        $this->studentDocumentCache = $studentDocumentCache;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        DB::beginTransaction();
        try {
            $livingPlace = Catalog::getKeyword($request['vivienda_id'])->first();
            $typeReligion = Catalog::getKeyword($request['type_religion_id'])->first();
            $statusMarital = Catalog::getKeyword($request['status_marital_id'])->first();
            $city = Catalog::getKeyword($request['city_id'])->first();
            $currentCity = Catalog::getKeyword($request['current_city_id'])->first();
            $sector = Catalog::getKeyword($request['sector_id'])->first();
            $ethnic = Catalog::getKeyword($request['ethnic_id'])->first();
            $typeIdentification = Catalog::getKeyword($request['type_identification_id'])->first();
            $modality = Catalog::getKeyword($request['modalidad_id'])->first();
            $journey = Catalog::getKeyword($request['jornada_id'])->first();

            if(isset($request['nationality_id']))
                $nationality = Catalog::getKeyWord($request['nationality'])->first();

            $educationLevel = EducationLevel::where('id', $request['education_level_id'])->whereRelation('meshs', function ($query) {
                $query->where('status_id', 7);
            })->first();

            if ($educationLevel) {
                $person = $this->savePerson(
                    $request,
                    $statusMarital,
                    $typeIdentification,
                    $typeReligion,
                    $livingPlace,
                    $city,
                    $currentCity,
                    $sector,
                    $ethnic
                );

                if(isset($request['nationality_id']))
                    $person->nationality_id = $nationality->id;

                $person->save();

                if ($request->get('pers_has_disability'))
                    $person->disabilities()->sync($request->get('pers_disabilities'));

                $user = new User($request->only(['email']));

                $user->us_username = $request->get('pers_identification');
                $password = Str::random(8);
                $user->password = Hash::make($password);
                $user->person_id = $person->id;
                $user->status_id = 1;
                $user->save();

                if (!is_null(Student::where('user_id', $user->id)->first()))
                    throw new ConflictException(__('messages.exist-instance'));

                $student = new Student($request->only(['campus_id']));
                $student->stud_code = $this->stud_code_avaliable();
                $student->user_id = $user->id;
                $student->modalidad_id = $modality->id;
                $student->jornada_id = $journey->id;
                $student->status_id = 1;

                $student->save();

                $studentRecord = new StudentRecord($request->only(['type_student_id', 'economic_group_id']));
                $studentRecord->education_level_id = $educationLevel->id;
                $studentRecord->mesh_id = $educationLevel->meshs[0]['id'];
                $studentRecord->student_id =  $student->id;
                $studentRecord->status_id = 1;
                $studentRecord->save();

                $params = [
                    "template"  => 23,
                    "subject"   => "Registro de usuario",
                    "view"      => "mails.register",
                    "to" => array(
                        ["name" => NULL, "email" => $request->get('email')]
                    ),
                    "params" => [
                        "USERNAME" => $user->us_username,
                        "PASSWORD" => $password,
                        "LINK" => CustomTenant::current()->domain_client,
                    ],
                ];

                $this->mailService->SendEmail($params);

                DB::commit();

                return $student;
                /* return $this->information(__('messages.student-saved')); */
            }

            return $this->information(__('messages.meshs-not-vigent'), Response::HTTP_CONFLICT);
        } catch (Exception $ex) {
            DB::rollback();
            throw new DatabaseException($ex->getInfo[2]);
        }
    }

    /**
     * StorageFile
     *
     * @param  mixed $request
     * @return void
     */
    public function StorageFile(Request $request)
    {
        $files = $this->filesystem->storage($request, "Admisiones estudiantes");

        for ($i = 0; $i < count($request->documents); $i++) {
            $document = TypeDocument::where([
                ['keyword', $request->documents[$i]]
            ])->first();
            StudentDocument::insert([
                [
                    'stu_doc_url' => $files[$i]["route"], 'stu_doc_name_file' => $files[$i]["name"],
                    'type_document_id' => $document->id, 'student_id' => $request->student, 'status_id' => 1
                ]
            ]);
        }
    }
}
