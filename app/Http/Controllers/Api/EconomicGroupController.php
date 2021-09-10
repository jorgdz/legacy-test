<?php

namespace App\Http\Controllers\Api;

use App\Cache\EconomicGroupCache;
use Illuminate\Http\Request;
use App\Traits\RestResponse;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\IEconomicGroupController;
use App\Http\Requests\EconomicGroupRequest;
use App\Models\EconomicGroup;
use Illuminate\Http\Response;

class EconomicGroupController extends Controller implements IEconomicGroupController
{
    use RestResponse;

    private $ecogroCache;
    
    /**
     * __construct
     *
     * @param  mixed $ecogroCache
     * @return void
     */
    public function __construct(EconomicGroupCache $ecogroCache)
    {
        $this->ecogroCache = $ecogroCache;
    }
    
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->ecogroCache->all($request));
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(EconomicGroupRequest $request)
    {
        $ecogroup = new EconomicGroup($request->all());
        $ecogroup = $this->ecogroCache->save($ecogroup);

        return $this->success($ecogroup, Response::HTTP_CREATED);
    }
    
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->ecogroCache->find($id));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $ecogroup
     * @return void
     */
    public function update(EconomicGroupRequest $request, EconomicGroup $ecogroup)
    {
        $ecogroup->fill($request->all());

        if ($ecogroup->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->ecogroCache->save($ecogroup));
    }
        
    /**
     * destroy
     *
     * @param  mixed $ecogroup
     * @return void
     */
    public function destroy(EconomicGroup $ecogroup)
    {
        return $this->success($this->ecogroCache->destroy($ecogroup));
    }
}
