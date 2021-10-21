<?php

namespace App\Http\Controllers\Api;

use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfigTypeApplication;
use App\Cache\ConfigTypeApplicationCache;
use App\Http\Requests\ConfigTypeApplicationRequest;
use App\Http\Controllers\Api\Contracts\IConfigTypeApplicationController;

class ConfigTypeApplicationController extends Controller implements IConfigTypeApplicationController
{
    use RestResponse;

    private $configTypeApplicationCache;

    public function __construct(ConfigTypeApplicationCache $configTypeApplicationCache)
    {
        $this->configTypeApplicationCache = $configTypeApplicationCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->configTypeApplicationCache->all($request));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(ConfigTypeApplicationRequest $request)
    {
        $configtypeapplication = new ConfigTypeApplication($request->all());
        return $this->success($this->configTypeApplicationCache->save($configtypeapplication));
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->configTypeApplicationCache->find($id));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $configtypeapplication
     * @return void
     */
    public function update(ConfigTypeApplicationRequest $request, ConfigTypeApplication $configtypeapplication)
    {

        $configtypeapplication->fill($request->all());
        
        if ($configtypeapplication->isClean())
            return $this->information(__('messages.nochange'));

        $response = $this->configTypeApplicationCache->save($configtypeapplication);


        return $this->success($response);
      
    }

    /**
     * destroy
     *
     * @param  mixed $configtypeapplication
     * @return void
     */
    public function destroy(ConfigTypeApplication $configtypeapplication)
    {
        $reponse = $this->configTypeApplicationCache->destroy($configtypeapplication);

        return $this->success($reponse);
    }
}
