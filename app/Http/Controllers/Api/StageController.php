<?php

namespace App\Http\Controllers\Api;

use App\Models\Stage;
use App\Cache\StageCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStageRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IStageController;

class StageController extends Controller implements IStageController
{
    //
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $stageCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (StageCache $stageCache) {
        $this->stageCache = $stageCache;
    }

    /**
     * index
     *
     * List all stages
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->stageCache->all($request));
    }

    /**
     * show
     *
     * Profile by :id
     * @param  mixed $stage
     * @return void
     */
    public function show (Request $request,$id) {
        return $this->success($this->stageCache->find($id));
    }

    /**
     * store
     *
     * Add new stage
     * @param  mixed $stage
     * @return void
     */
    public function store (StoreStageRequest $request) {
        $stageRequest = $request->all();
        $stagePreview = Stage::where('stg_name','=',$stageRequest['stg_name'])->get();
        if ($stagePreview->isNotEmpty())
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(Stage::class)]));
        
        $stage = new Stage($stageRequest);
        return $this->success($this->stageCache->save($stage));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $stage
     * @return void
     */
    public function update (StoreStageRequest $request, Stage $stage) {
        $stageRequest = $request->all();
        $stagePreview = Stage::where('stg_name','=',$stageRequest['stg_name'])->get();
        if ($stagePreview->isNotEmpty() && $stageRequest['stg_name'] != $stage['stg_name'] )
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(Stage::class)]));

        $stage->fill($stageRequest);
        if ($stage->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        return $this->success($this->stageCache->save($stage));
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage) {
        return $this->success($this->stageCache->destroy($stage));
    }
}
