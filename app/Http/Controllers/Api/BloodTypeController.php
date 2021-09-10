<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Cache\BloodTypeCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Contracts\IBloodTypeController;

class BloodTypeController extends Controller implements IBloodTypeController
{
    use RestResponse;

    private $bloodTypeCache;

    public function __construct(BloodTypeCache $bloodTypeCache)
    {
        $this->bloodTypeCache = $bloodTypeCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->bloodTypeCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BloodType  $bloodType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->bloodTypeCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BloodType  $bloodType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodType $bloodType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BloodType  $bloodType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodType $bloodType)
    {
        //
    }
}
