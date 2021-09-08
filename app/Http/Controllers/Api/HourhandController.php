<?php

namespace App\Http\Controllers\Api;

use App\Models\Hourhand;
use App\Cache\HourhandCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHourhandRequest;
use App\Exceptions\Custom\UnprocessableException;

class HourhandController extends Controller
{
    use RestResponse;

    /**
     * hourhandCache
     *
     * @var mixed
     */
    private $hourhandCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (HourhandCache $hourhandCache) {
        $this->hourhandCache = $hourhandCache;
    }

    /**
     * index
     *
     * List all hourhands
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->hourhandCache->all($request));
    }

    /**
     * show
     *
     * Hourhands by :id
     * @param  mixed $hourhands
     * @return void
     */
    public function show (Request $request,$id) {
        return $this->success($this->hourhandCache->find($id));
    }

    /**
     * store
     *
     * Add new hourhand
     * @param  mixed $hourhand
     * @return void
     */
    public function store (StoreHourhandRequest $request) {
        $hourhandRequest = $request->all();
        $hourhand = new Hourhand($hourhandRequest);
        return $this->success($this->hourhandCache->save($hourhand));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $hourhand
     * @return void
     */
    public function update (StoreHourhandRequest $request, Hourhand $hourhand) {
        $hourhandRequest = $request->all();
        $hourhand->fill($hourhandRequest);
        if ($hourhand->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->hourhandCache->save($hourhand));
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hourhand $hourhand) {
        return $this->success($this->hourhandCache->destroy($hourhand));
    }
}
