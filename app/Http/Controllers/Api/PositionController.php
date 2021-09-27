<?php

namespace App\Http\Controllers\Api;

use App\Cache\PositionCache;
use App\Http\Controllers\Api\Contracts\IPositionController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PositionController extends Controller implements IPositionController
{
    use RestResponse;

    /**
     * positionCache
     *
     * @var mixed
     */
    private $positionCache;

    /**
     * __construct
     *
     * @param  mixed $positionCache
     * @return void
     */
    public function __construct(PositionCache $positionCache)
    {
        $this->positionCache = $positionCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->positionCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        $position = new Position($request->all());
        return $this->success($this->positionCache->save($position), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->positionCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->fill($request->all());

        if ($position->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->positionCache->save($position));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        return $this->success($this->positionCache->destroy($position));
    }
}
