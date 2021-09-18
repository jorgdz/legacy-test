<?php

namespace App\Http\Controllers\Api;

use App\Models\Matter;
use App\Cache\MatterCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatterRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IMatterController;
use Exception;

class MatterController extends Controller implements IMatterController
{
    use RestResponse;

    private $matterCache;

    public function __construct(MatterCache $matterCache) {
        $this->matterCache = $matterCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->matterCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatterRequest $request) {
        $matter = new Matter($request->all());
        $matter = $this->matterCache->save($matter);

        return $this->success($matter, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->matterCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMatterRequest $request, Matter $matter) {
        $matter->fill($request->all());
        if ($matter->isClean())
            return $this->information(__('messages.nochange'));

        $response = $this->matterCache->save($matter);

        return $this->success($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matter $matter) {
        return $this->success($this->matterCache->destroy($matter));
    }
}
