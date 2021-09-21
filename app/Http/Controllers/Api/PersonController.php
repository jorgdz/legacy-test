<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use App\Cache\PersonCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\UpdateLanguagesPersonRequest;
use App\Http\Controllers\Api\Contracts\IPersonController;
use App\Http\Requests\StoreAssignPersonJobsRequest;
use App\Traits\Auditor;

class PersonController extends Controller implements IPersonController
{
    use RestResponse, Auditor;

    private $personCache;

    public function __construct(PersonCache $personCache) {
        $this->personCache = $personCache;
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
        $person = new Person($request->all());
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
    public function updateLanguagePerson(UpdateLanguagesPersonRequest $request, Person $person)
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
        $relatives = Person::with('person_student.person_relative')->find($person->id);
        return $this->success($relatives);
    }
}
