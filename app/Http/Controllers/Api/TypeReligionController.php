<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeReligion;
use App\Cache\TypeReligionCache;
use Illuminate\Http\Request;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\ITypeReligionController;

class TypeReligionController extends Controller implements ITypeReligionController
{
    use RestResponse;

    private $typeReligionCache;

    public function __construct(TypeReligionCache $typeReligionCache)
    {
        $this->typeReligionCache = $typeReligionCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeReligionCache->all($request));
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
     * @param  \App\Models\TypeReligion  $typeReligion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typeReligionCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeReligion  $typeReligion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeReligion $typeReligion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeReligion  $typeReligion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeReligion $typeReligion)
    {
        //
    }
}
