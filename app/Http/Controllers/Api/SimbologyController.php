<?php

namespace App\Http\Controllers\Api;

use App\Cache\SimbologyCache;
use App\Http\Controllers\Api\Contracts\ISimbologyController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SimbologyRequest;
use App\Http\Requests\UpdateSimbologyRequest;
use App\Models\Simbology;
use App\Traits\RestResponse;
use Illuminate\Http\Request;

class SimbologyController extends Controller implements ISimbologyController
{
    use RestResponse;

    private $simbologyCache;

    public function __construct(SimbologyCache $simbologyCache)
    {
        $this->simbologyCache = $simbologyCache;
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->simbologyCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SimbologyRequest $request)
    {
        $simbology = new Simbology($request->all());
        return $this->success($this->simbologyCache->save($simbology));
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->simbologyCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simbology  $simbology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSimbologyRequest $request, Simbology $simbology)
    {
        $simbology->fill($request->all());
        if ($simbology->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->simbologyCache->save($simbology));
    }
}
