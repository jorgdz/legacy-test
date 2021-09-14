<?php

namespace App\Http\Controllers\Api;

use App\Cache\PersonJobCache;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Api\Contracts\IPersonJobController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePersonJobRequest;
use App\Models\Person;
use App\Models\PersonJob;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonJobController extends Controller implements IPersonJobController
{
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $personJobCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PersonJobCache $personJobCache) {
        $this->personJobCache = $personJobCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->personJobCache->all($request));
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StorePersonJobRequest $request)
    {
        $personjob = new PersonJob($request->all());

        return $this->success($this->personJobCache->save($personjob), Response::HTTP_CREATED);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->personJobCache->find(intval($id)));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $personjob
     * @return void
     */
    public function update(StorePersonJobRequest $request, PersonJob $personjob)
    {
        $personjob->fill($request->all());

        if ($personjob->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->personJobCache->save($personjob));
    }
        
    /**
     * destroy
     *
     * @param  mixed $personjob
     * @return void
     */
    public function destroy(PersonJob $personjob)
    {
        return $this->success($this->personJobCache->destroy($personjob));
    }
}
