<?php

namespace App\Http\Controllers\Api;

use App\Models\AreaGroup;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\AreaGroupCache;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\IAreaGroupController;
use App\Http\Requests\AreaGroupRequest;

class AreaGroupController extends Controller implements IAreaGroupController
{
    use RestResponse;

    private $areaGroupCache;

    public function __construct(AreaGroupCache $areaGroupCache) {
        $this->areaGroupCache = $areaGroupCache;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->areaGroupCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaGroupRequest $request)
    {
        return $this->success($this->areaGroupCache
                ->saveAreaGroupWithSubjects($request->all()),
            Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AreaGroup  $areaGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->areaGroupCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AreaGroup  $areaGroup
     * @return \Illuminate\Http\Response
     */
    public function update(AreaGroupRequest $request, AreaGroup $areaGroup)
    {
        $areaGroup->fill($request->all());

        if ($areaGroup->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->areaGroupCache->save($areaGroup));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AreaGroup  $areaGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaGroup $areaGroup)
    {
        return $this->success($this->areaGroupCache->destroy($areaGroup));
    }
}
