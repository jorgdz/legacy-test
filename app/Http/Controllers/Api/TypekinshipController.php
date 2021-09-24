<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeKinship;
use App\Cache\TypeKinshipCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Contracts\ITypeKinshipController;

class TypeKinshipController extends Controller implements ITypeKinshipController
{
    use RestResponse;

    private $typeKinshipCache;

    public function __construct(TypeKinshipCache $typeKinshipCache)
    {
        $this->typeKinshipCache = $typeKinshipCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeKinshipCache->all($request));
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
     * @param  \App\Models\TypeKinship  $typekinship
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typeKinshipCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeKinship  $typekinship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeKinship $typekinship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeKinship  $typekinship
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeKinship $typekinship)
    {
        //
    }
}
