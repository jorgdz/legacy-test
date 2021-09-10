<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeEducation;
use App\Cache\TypeEducationCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Contracts\ITypeEducationController;

class TypeEducationController extends Controller implements ITypeEducationController
{
    use RestResponse;

    private $typeEducationCache;

    public function __construct(TypeEducationCache $typeEducationCache)
    {
        $this->typeEducationCache = $typeEducationCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeEducationCache->all($request));
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
     * @param  \App\Models\TypeEducation  $typeEducation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typeEducationCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeEducation  $typeEducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeEducation $typeEducation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeEducation  $typeEducation
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeEducation $typeEducation)
    {
        //
    }
}
