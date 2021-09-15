<?php

namespace App\Http\Controllers\Api;

use App\Models\Status;
use App\Cache\StatusCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\IStatusController;

class StatusController extends Controller implements IStatusController
{
    //
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $statusCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (StatusCache $statusCache) {
        $this->statusCache = $statusCache;
    }

    /**
     * index
     *
     * List all status
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->statusCache->all($request));
    }

    /**
     * show
     *
     * Status by :id
     * @param  mixed $status
     * @return void
     */
    public function show (Request $request,$id) {
        //return $this->success($this->typePeriodCache->find($id));
    }

    /**
     * store
     *
     * Add new profile
     * @param  mixed $profile
     * @return void
     */
    public function store (Request $request) {
        
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $profile
     * @return void
     */
    public function update (Request $request, Status $status) {
        
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status) {
       
    }
}
