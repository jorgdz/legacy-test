<?php

namespace App\Http\Controllers\Api;

use App\Cache\PeriodStageCache;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IPeriodStageController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeriodStageRequest;
use App\Http\Requests\ShowByUserProfileIdRequest;
use App\Http\Requests\StorePeriodStageRequest;
use App\Models\PeriodStage;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeriodStageController extends Controller implements IPeriodStageController
{
    //
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $periodStageCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PeriodStageCache $periodStageCache) {
        $this->periodStageCache = $periodStageCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->periodStageCache->all($request));
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StorePeriodStageRequest $request)
    {
        $periodStagePreview = PeriodStage::where('stage_id', $request->stage_id)->where('period_id', $request->period_id)->get();
        //Si hay data repetida manda una excepcion
        if ($periodStagePreview->isNotEmpty())
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(PeriodStage::class)]));

        $periodStage = new PeriodStage($request->all());
        
        return $this->success($this->periodStageCache->save($periodStage), Response::HTTP_CREATED);
    }
        
    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->periodStageCache->find(intval($id)));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $periodstage
     * @return void
     */
    public function update(PeriodStageRequest $request, PeriodStage $periodstage)
    {
        $periodstage->fill($request->all());
 
        if ($periodstage->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        return $this->success($this->periodStageCache->save($periodstage));
    }
    
    /**
     * destroy
     *
     * @param  mixed $periodstage
     * @return void
     */
    public function destroy(PeriodStage $periodstage)
    {
        return $this->success($this->periodStageCache->destroy($periodstage));
    }
}
