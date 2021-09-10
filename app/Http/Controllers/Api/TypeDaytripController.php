<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypeDaytrip;
use App\Cache\TypeDaytripCache;
use App\Traits\RestResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Contracts\ITypeDaytripController;

class TypeDaytripController extends Controller implements ITypeDaytripController
{
    use RestResponse;

    private $typeDaytripCache;

    public function __construct(TypeDaytripCache $typeDaytripCache)
    {
        $this->typeDaytripCache = $typeDaytripCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->typeDaytripCache->all($request));
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
     * @param  \App\Models\TypeDaytrip  $typeDaytrip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->typeDaytripCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeDaytrip  $typeDaytrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeDaytrip $typeDaytrip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeDaytrip  $typeDaytrip
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeDaytrip $typeDaytrip)
    {
        //
    }
}
