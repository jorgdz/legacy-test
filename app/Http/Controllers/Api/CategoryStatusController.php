<?php

namespace App\Http\Controllers\Api;

use App\Cache\CategoryStatusCache;
use App\Http\Controllers\Api\Contracts\ICategoryStatusController;
use App\Http\Controllers\Controller;
use App\Models\CategoryStatus;
use App\Traits\RestResponse;
use Illuminate\Http\Request;

class CategoryStatusController extends Controller implements ICategoryStatusController
{
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $categoryStatusCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (CategoryStatusCache $categoryStatusCache) {
        $this->categoryStatusCache = $categoryStatusCache;
    }

    /**
     * index
     *
     * List all status
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->categoryStatusCache->all($request));
    }

    /**
     * show
     *
     * Status by :id
     * @param  mixed $status
     * @return void
     */
    public function show (Request $request,$id) {
        //
    }

    /**
     * store
     *
     * Add new profile
     * @param  mixed $profile
     * @return void
     */
    public function store (Request $request) {
        // 
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $profile
     * @return void
     */
    public function update (Request $request, CategoryStatus $status) {
        // 
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryStatus $categorystatus) {
        //    
    }
}
