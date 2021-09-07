<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\RestResponse;
use App\Models\MatterStatus;
use Illuminate\Http\Response;
use App\Cache\MatterStatusCache;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Exceptions\Custom\ConflictException;
use App\Http\Requests\StoreMatterStatusRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IMatterStatusController;


class MatterStatusController extends Controller implements IMatterStatusController
{
    use RestResponse;

    private $matterStatusCache;

    public function __construct(MatterStatusCache $matterStatusCache) {
        $this->matterStatusCache = $matterStatusCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->matterStatusCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatterStatusRequest $request) {
        DB::beginTransaction();
        try {
            $matterStatus = new MatterStatus($request->all());
            $matterStatus = $this->matterStatusCache->save($matterStatus);

            DB::commit();
            return $this->success($matterStatus, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->matterStatusCache->find($id), Response::HTTP_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatterStatus $matterStatus) {
        DB::beginTransaction();
        try {
            $matterStatus->fill($request->all());

            if ($matterStatus->isClean())
                throw new UnprocessableException(__('messages.nochange'));

            $response = $this->matterStatusCache->save($matterStatus);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatterStatus $matterStatus) {
        DB::beginTransaction();
        try {
            $response = $this->matterStatusCache->destroy($matterStatus);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
