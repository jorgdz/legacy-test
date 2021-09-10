<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Cache\TypeIdentificationCache;
use App\Models\TypeIdentification;
use Illuminate\Http\Request;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\ITypeIdentificationController;

class TypeIdentificationController extends Controller
{
    use RestResponse;

    private $typeIdentificationCache;

    public function __construct(TypeIdentificationCache $typeIdentificationCache)
    {
        $this->typeIdentificationCache = $typeIdentificationCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeIdentificationCache->all($request));
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
     * @param  \App\Models\TypeIdentification  $typeIdentification
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typeIdentificationCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeIdentification  $typeIdentification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeIdentification $typeIdentification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeIdentification  $typeIdentification
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeIdentification $typeIdentification)
    {
        //
    }
}
