<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Typekinship;
use App\Cache\TypekinshipCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Contracts\ITypeKinshipController;

class TypekinshipController extends Controller implements ITypeKinshipController
{
    use RestResponse;

    private $typekinshipCache;

    public function __construct(TypekinshipCache $typekinshipCache)
    {
        $this->typekinshipCache = $typekinshipCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typekinshipCache->all($request));
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
     * @param  \App\Models\Typekinship  $typekinship
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typekinshipCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Typekinship  $typekinship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typekinship $typekinship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Typekinship  $typekinship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typekinship $typekinship)
    {
        //
    }
}
