<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use App\Cache\PersonCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Http\Controllers\Api\Contracts\IPersonController;
use App\Http\Requests\StoreAssignPersonJobsRequest;
use App\Models\PersonJob;

class PersonController extends Controller implements IPersonController
{
    use RestResponse;

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
        DB::beginTransaction();
        try {
            $person = new Person($request->all());
            $person = $this->personCache->save($person);

            DB::commit();
            return $this->success($person, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
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

        return $this->success($person->personJob, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->personCache->find($id), Response::HTTP_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, Person $person) {
        DB::beginTransaction();
        try {
            $person->fill($request->all());

            if ($person->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->personCache->save($person);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person) {
        DB::beginTransaction();
        try {
            $response = $this->personCache->destroy($person);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
