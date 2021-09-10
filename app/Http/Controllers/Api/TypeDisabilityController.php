<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeDisability;
use App\Cache\TypeDisabilityCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Contracts\ITypeDisabilityController;

class TypeDisabilityController extends Controller  implements ITypeDisabilityController
{
    use RestResponse;

    private $typeDisabilityCache;

    public function __construct(TypeDisabilityCache $typeDisabilityCache)
    {
        $this->typeDisabilityCache = $typeDisabilityCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeDisabilityCache->all($request));
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
     * @param  \App\Models\TypeDisability  $typeDisability
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typeDisabilityCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeDisability  $typeDisability
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDisability $typeDisability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeDisability  $typeDisability
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDisability $typeDisability)
    {
        //
    }
}
