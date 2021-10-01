<?php

namespace App\Http\Controllers\Api;

use App\Models\CustomStatus;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\CustomStatusCache;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\ICustomStatusController;

class CustomStatusController extends Controller implements ICustomStatusController
{
    use RestResponse;

    private $statusCache;

    public function __construct(CustomStatusCache $statusCache)
    {
        $this->statusCache = $statusCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->statusCache->all($request));
    }
}
