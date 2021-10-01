<?php

namespace App\Http\Controllers\Api;

use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\CustomModuleCache;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\ICustomModulesController;

class CustomModulesController extends Controller implements ICustomModulesController
{
    use RestResponse;

    private $moduleCache;

    public function __construct(CustomModuleCache $moduleCache)
    {
        $this->moduleCache = $moduleCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->moduleCache->all($request));
    }
}
