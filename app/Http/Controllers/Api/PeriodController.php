<?php

namespace App\Http\Controllers\Api;

use App\Models\Campus;
use App\Models\Period;
use App\Cache\PeriodCache;
use App\Models\TypePeriod;
use App\Models\OfferPeriod;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Cache\OfferPeriodCache;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeriodRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\NotFoundException;
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
    private $offerPeriodCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (PeriodCache $periodCache, OfferPeriodCache $offerPeriodCache) {
        $this->periodCache = $periodCache;
        $this->offerPeriodCache = $offerPeriodCache;
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

        $periodPreview = Period::where([['campus_id','=',$periodRequest['campus_id']],['type_period_id','=',$periodRequest['type_period_id']],['status_id','=',$periodRequest['status_id']]])->get();
        if ($periodPreview->isNotEmpty())
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(Period::class)]));

        $period->fill($periodRequest);
        if ($period->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->periodCache->save($period));
    }

    /**
     * Remove
     *
     * @param  mixed  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period) {
        return $this->success($this->periodCache->destroy($period));
    }

    /**
     * showOfferByPeriod
     *
     * @param  mixed $request
     * @param  mixed $offer
     * @return void
     */
    public function showOffersByPeriod ( Request $request,Period $period ) {
        return $this->success($this->offerPeriodCache->showOffersByPeriod($period));
    }

    /**
     * Remove
     *
     * @param  mixed  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroyOffersByPeriod(Request $request,Period $period) {
        $offerPeriods = OfferPeriod::where('period_id',$period->id)->get();
        if ($offerPeriods->isEmpty())
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(OfferPeriod::class)]));

        foreach ($offerPeriods as $offerPeriod) {
            $offerPeriod = $this->offerPeriodCache->destroy($offerPeriod);
        }
        return $this->success($offerPeriods);
    }
}
