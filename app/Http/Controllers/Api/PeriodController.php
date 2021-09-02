<?php

namespace App\Http\Controllers\Api;

use App\Models\Campus;
use App\Models\Period;
use App\Cache\PeriodCache;
use App\Models\TypePeriod;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeriodRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;

class PeriodController extends Controller
{
    //
    use RestResponse;

    /**
     * repoProfile
     *
     * @var mixed
     */
    private $periodCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PeriodCache $periodCache) {
        $this->periodCache = $periodCache;
    }

    /**
     * index
     *
     * List all periods
     * @return void
     */
    public function index (Request $request) {
        return $this->success($this->periodCache->all($request));
    }

    /**
     * show
     *
     * Period by :id
     * @param  mixed $period
     * @return void
     */
    public function show (Request $request,$id) {
        return $this->success($this->periodCache->find($id));
    }

    /**
     * store
     *
     * Add new period
     * @param  mixed $period
     * @return void
     */
    public function store (StorePeriodRequest $request) {
        $periodRequest = $request->all();
        $periodPreview = Period::where([['campus_id','=',$periodRequest['campus_id']],['type_period_id','=',$periodRequest['type_period_id']]])->get();
        if ($periodPreview->isNotEmpty())
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(period::class)]));
        
        $campusPreview = Campus::where('id',$periodRequest['campus_id'])->get();
        if ($campusPreview->isEmpty())
            throw new ConflictException(__('messages.no-exist-instance', ['model' => class_basename(Campus::class)]));
        
        $typePeriodPreview = TypePeriod::where('id',$periodRequest['type_period_id'])->get();
        if ($typePeriodPreview->isEmpty())
            throw new ConflictException(__('messages.no-exist-instance', ['model' => class_basename(TypePeriod::class)]));
        
        $period = new Period($periodRequest);
        return $this->success($this->periodCache->save($period));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $period
     * @return void
     */
    public function update (StorePeriodRequest $request, Period $period) {
        $periodRequest = $request->all();

        $period->fill($periodRequest);
        if ($period->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        $periodPreview = Period::where([['campus_id','=',$periodRequest['campus_id']],['type_period_id','=',$periodRequest['type_period_id']],['status_id','=',$periodRequest['status_id']]])->get();
        if ($periodPreview->isNotEmpty())
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(Period::class)]));

        $campusPreview = Campus::where('id',$periodRequest['campus_id'])->get();
        if ($campusPreview->isEmpty())
            throw new ConflictException(__('messages.no-exist-instance', ['model' => class_basename(Campus::class)]));
        
        $typePeriodPreview = TypePeriod::where('id',$periodRequest['type_period_id'])->get();
        if ($typePeriodPreview->isEmpty())
            throw new ConflictException(__('messages.no-exist-instance', ['model' => class_basename(TypePeriod::class)]));

        

        return $this->success($this->periodCache->save($period));
    }

    /**
     * Remove
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period) {
        return $this->success($this->periodCache->destroy($period));
    }
}
