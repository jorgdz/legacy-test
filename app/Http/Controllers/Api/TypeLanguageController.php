<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeLanguage;
use App\Cache\TypeLanguageCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Contracts\ITypeLanguageController;

class TypeLanguageController extends Controller implements ITypeLanguageController
{
    use RestResponse;

    private $typeLanguageCache;

    public function __construct(TypeLanguageCache $typeLanguageCache)
    {
        $this->typeLanguageCache = $typeLanguageCache;
    }

    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeLanguageCache->all($request));
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
     * @param  \App\Models\TypeLanguage  $typeLanguage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typeLanguageCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeLanguage  $typeLanguage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeLanguage $typeLanguage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeLanguage  $typeLanguage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeLanguage $typeLanguage)
    {
        //
    }
}
