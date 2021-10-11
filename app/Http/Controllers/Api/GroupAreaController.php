<?php

namespace App\Http\Controllers\Api;

use App\Cache\GroupAreaCache;
use App\Http\Controllers\Controller;
use App\Models\GroupArea;
use App\Traits\RestResponse;
use Illuminate\Http\Request;

class GroupAreaController extends Controller
{

    use RestResponse;

    /**
     * groupAreaCache
     *
     * @var mixed
     */
    private $groupAreaCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (GroupAreaCache $groupAreaCache) {
        $this->groupAreaCache = $groupAreaCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->groupAreaCache->all($request));
    }
}
