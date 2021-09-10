<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ethnic;
use App\Cache\EthnicCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class EthnicController extends Controller
{
    use RestResponse;

    private $ethnicCache;

    public function __construct(EthnicCache $ethnicCache)
    {
        $this->ethnicCache = $ethnicCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->ethnicCache->all($request));
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
     * @param  \App\Models\Ethnic  $ethnic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->ethnicCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ethnic  $ethnic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ethnic $ethnic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ethnic  $ethnic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ethnic $ethnic)
    {
        //
    }
}
