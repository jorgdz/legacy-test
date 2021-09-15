<?php

namespace App\Http\Controllers\Api;

use App\Models\Hourhand;
use App\Cache\HourhandCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHourhandRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Api\Contracts\IHourhandController;

class HourhandController extends Controller implements IHourhandController
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
    public function show ($id) {
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
        $hourhand = new Hourhand($request->all());
        return $this->success($this->hourhandCache->save($hourhand), Response::HTTP_CREATED);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $hourhand
     * @return void
     */
    public function update (StoreHourhandRequest $request, Hourhand $hourhand) {

        $hourhand->fill($request->all());

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
