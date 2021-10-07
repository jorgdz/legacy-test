<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use App\Traits\Helper;
use App\Models\Student;
use App\Traits\Auditor;
use App\Cache\PersonCache;
use App\Cache\StudentCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Exceptions\Custom\ConflictException;
use App\Http\Requests\StoreAssignPersonJobsRequest;
use App\Http\Requests\UpdateLanguagesPersonRequest;
use App\Http\Controllers\Api\Contracts\IPersonController;
use App\Models\Catalog;
use App\Traits\SavePerson;

class PersonController extends Controller implements IPersonController
{
    use RestResponse, Auditor, Helper, SavePerson;

    private $personCache;
    private $studentCache;

    public function __construct(PersonCache $personCache,StudentCache $studentCache) {
        $this->personCache = $personCache;
        $this->studentCache = $studentCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->personCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request) {

        $nacionality = Catalog::getKeyword($request['pers_nacionality_keyword'])->first();
        $statusMarital = Catalog::getKeyword($request['status_marital_keyword'])->first();
        $typeIdentification = Catalog::getKeyword($request['type_identification_keyword'])->first();
        $typeReligion = Catalog::getKeyword($request['type_religion_keyword'])->first();
        $livingPlace = Catalog::getKeyword($request['vivienda_keyword'])->first();
        $city = Catalog::getKeyword($request['city_keyword'])->first();
        $currentCity = Catalog::getKeyword($request['current_city_keyword'])->first();
        $sector = Catalog::getKeyword($request['sector_keyword'])->first();
        $ethnic = Catalog::getKeyword($request['ethnic_keyword'])->first();

        $person = $this->savePerson(
            $request,
            $nacionality,
            $statusMarital,
            $typeIdentification,
            $typeReligion,
            $livingPlace,
            $city,
            $currentCity,
            $sector,
            $ethnic
        );

        return $this->success($this->personCache->save($person), Response::HTTP_CREATED);
    }

    /**
     * assignJobs
     *
     * Asignacion masiva de trabajos a una persona
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function assignJobs(StoreAssignPersonJobsRequest $request, Person $person)
    {
        $person->personJob()->createMany($request->jobs);
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Person::class)));
        return $this->success($person->personJob, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->personCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Person $person) {
        $person->fill($request->all());

        if ($person->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->personCache->save($person));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person) {
        return $this->success($this->personCache->destroy($person));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function assignLanguages(UpdateLanguagesPersonRequest $request, Person $person)
    {
        $person->languages()->sync($request->languages);
        return $this->success(Person::with('languages')->find($person->id));
    }

    /**
     * showRelativeByPerson
     *
     * @param  mixed $person
     * @return void
     */
    public function showRelativeByPerson (Person $person ) {
        $relatives = Person::with('associatedPerson.personRelative')->find($person->id);
        return $this->success($relatives);
    }

    /**
     * Set a person as student.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function personAsStudent(Request $request, Person $person)
    {
        if(is_null($person->user))
            throw new ConflictException(__('messages.exist-instance'));

        $user = $person->user;

        $student = new Student($request->only(['campus_id','modalidad_id','jornada_id']));
        $student->stud_code = $this->stud_code_avaliable();
        $student->user_id = $user->id;
        $student->status_id = 1;

        return $this->success($this->studentCache->save($student));
    }
}
