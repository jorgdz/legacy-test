<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Cache\CityCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\CityFormRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\ICityController;

class CityController extends Controller implements ICityController
{

    use RestResponse;

    private $cityCache;

    public function __construct(CityCache $cityCache)
    {
        $this->cityCache = $cityCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->cityCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityFormRequest $request)
    {
        $city = new City($request->all());
        $city = $this->cityCache->save($city);
        return $this->success($city, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->cityCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
