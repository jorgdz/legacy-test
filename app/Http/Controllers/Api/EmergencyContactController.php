<?php

namespace App\Http\Controllers\Api;

use App\Traits\RestResponse;
use App\Cache\EmergencyContactCache;
use App\Http\Controllers\Controller;
use App\Models\EmergencyContact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\EmergencyContactFormRequest;
use App\Http\Controllers\Api\Contracts\IEmergencyContactController;
use App\Models\Person;
use phpDocumentor\Reflection\Types\This;

class EmergencyContactController extends Controller  implements IEmergencyContactController
{
    use RestResponse;
    private $emergencyContactCache;

    /**
     * __construct
     *
     * @param  mixed $companyCache
     * @return void
     */
    public function __construct(EmergencyContactCache $emergencyContactCache)
    {
        $this->emergencyContactCache = $emergencyContactCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->emergencyContactCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmergencyContactFormRequest $request)
    {   
        $emergencyContacts = $request->get('emergencyContacts');

        $this->emergencyContactCache->saveMultiple($emergencyContacts);
        $emergencyContact = Person::find($request->get('person_id'))->with('emergencyContact')->first();
        return $this->success($emergencyContact);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->emergencyContactCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmergencyContact $emergencycontact)
    {
        $emergencycontact->fill($request->all());

        if ($emergencycontact->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->emergencyContactCache->save($emergencycontact));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmergencyContact $emergencycontact)
    {
        return $this->success($this->emergencyContactCache->destroy($emergencycontact));
    }
}
