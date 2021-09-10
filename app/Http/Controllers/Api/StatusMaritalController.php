<?php

namespace App\Http\Controllers\Api;

use App\Cache\StatusMaritalCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\StatusMarital;
use Illuminate\Http\Request;

class StatusMaritalController extends Controller
{
    use RestResponse;

    private $statusMaritalCache;

    public function __construct(StatusMaritalCache $statusMaritalCache)
    {
        $this->statusMaritalCache = $statusMaritalCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->statusMaritalCache->all($request));
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
     * @param  \App\Models\StatusMarital  $statusMarital
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->statusMaritalCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusMarital  $statusMarital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusMarital $statusMarital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusMarital  $statusMarital
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusMarital $statusMarital)
    {
        //
    }
}
