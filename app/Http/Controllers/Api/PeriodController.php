<?php

namespace App\Http\Controllers\Api;

use App\Models\Period;
use App\Cache\PeriodCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Traits\Auditor;

class PeriodController extends Controller
{
    use RestResponse, Auditor;

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
    public function show ($id) {
        return $this->success($this->periodCache->find($id));
    }

    /**
     * store
     *
     * Add new period
     * @param  mixed $request
     * @return void
     */
    public function store (StorePeriodRequest $request) {

        $currentYear = intval(date('Y'));
        $perDueYear = date('Y') + 1;

        $periodRequest = array_merge(['per_current_year' => $currentYear],['per_due_year' => $perDueYear],$request->all());

        $period = new Period($periodRequest);

        $this->periodCache->save($period);

        $period->offers()->sync($request->offers, false);

        return $this->success($period);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $period
     * @return void
     */
    public function update (UpdatePeriodRequest $request, Period $period) {

        $currentYear = intval(date('Y'));
        $perDueYear = date('Y') + 1;

        $periodRequest = array_merge(['per_current_year' => $currentYear],['per_due_year' => $perDueYear],$request->all());

        $period->fill($periodRequest);

        if ($period->isClean())
            return $this->information(__('messages.nochange'));

        $period->offers()->sync($request->offers);
        return $this->success($this->periodCache->save($period));
    }

    /**
     * Remove
     *
     * @param  mixed  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period) {
        $period->offers()->detach();
        return $this->success($this->periodCache->destroy($period));
    }

    /**
     * showOfferByPeriod
     *
     * @param  mixed $id
     * @return void
     */
    public function showOffersByPeriod (Period $period) {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Period::class)));
        return $this->success($this->periodCache->showOffersByPeriod($period));
    }

    /**
     * destroyOffersByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function destroyOffersByPeriod(Period $period) {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Period::class)));
        return $this->success($this->periodCache->destroyOffersByPeriod($period));
    }

}
