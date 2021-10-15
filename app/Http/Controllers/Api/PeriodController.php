<?php

namespace App\Http\Controllers\Api;

use App\Models\Period;
use App\Cache\PeriodCache;
use App\Http\Controllers\Api\Contracts\IPeriodController;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Models\Campus;
use App\Traits\Auditor;

class PeriodController extends Controller implements IPeriodController
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
    public function __construct(PeriodCache $periodCache)
    {
        $this->periodCache = $periodCache;
    }

    /**
     * index
     *
     * List all periods
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->periodCache->all($request));
    }

    /**
     * show
     *
     * Period by :id
     * @param  mixed $period
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->periodCache->find($id));
    }

    /**
     * stagesByPeriod
     *
     * @param  mixed $id
     * @return void
     */
    public function stagesByPeriod ($id) {
        return $this->success($this->periodCache->findStagesByPeriod($id));
    }

    /**
     * store
     *
     * Add new period
     * @param  mixed $request
     * @return void
     */
    public function store(StorePeriodRequest $request)
    {

        $currentYear = intval(date('Y'));
        $perDueYear = date('Y') + 1;
        $campus = $request->campus;


        for ($i = 0; $i < count($request->campus); $i++) {

            $campusLetra = Campus::findOrFail($request->campus[$i]);

            $periodRequest = array_merge(
                ['per_reference' => $currentYear . substr($campusLetra->cam_name, 0, 1) . Period::withTrashed()->count() + 1],
                ['per_current_year' => $currentYear],
                ['per_due_year' => $perDueYear],
                ['campus_id' => $campus[$i]],
                $request->all()
            );

            $period = new Period($periodRequest);
            $this->periodCache->save($period);
            $period->offers()->sync($request->offers, false);
            $period->hourhands()->sync($request->hourhands, false);
        }

        return $this->information(__('messages.success'));
    }

    public function copiePeriod(Request $request)
    {
        $request->validate([
            'period_year' => 'date_format:Y',
            'new_current_year' => 'date_format:Y|after:period_year',
        ]);

        $periods = Period::where('per_current_year', $request->period_year)->get();

        if (!$periods->first())
            return $this->information(__('messages.nochange'));

        foreach ($periods as $period) {

            $new_period = $period->replicate()->fill([
                'per_reference' => $request->new_current_year . substr($period->campus->cam_name, 0, 1) . Period::withTrashed()->count() + 1,
                'per_current_year' => $request->new_current_year,
                'per_due_year' => intval($request->new_current_year) + 1,
                'status_id' => 1,
            ]);

            $new_period->save();
            $new_period->offers()->attach($period->offers);
        }

        return $this->information(__('messages.success'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $period
     * @return void
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {

        $currentYear = intval(date('Y'));
        $perDueYear = date('Y') + 1;

        $periodRequest = array_merge(
            ['per_current_year' => $currentYear],
            ['per_due_year' => $perDueYear],
            $request->all()
        );

        $period->fill($periodRequest);

        if ($period->isClean() && !isset($request['hourhands']) && !isset($request['offers']))
            return $this->information(__('messages.nochange'));

        if (isset($request['offers']))
            $period->offers()->sync($request->offers);

        if (isset($request['hourhands']))
            $period->hourhands()->sync($request->hourhands);

        return $this->success($this->periodCache->save($period));
    }

    /**
     * Remove
     *
     * @param  mixed  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->offers()->detach();
        $period->hourhands()->detach();
        return $this->success($this->periodCache->destroy($period));
    }

    /**
     * showOfferByPeriod
     *
     * @param  mixed $id
     * @return void
     */
    public function showOffersByPeriod(Period $period)
    {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Period::class)));
        return $this->success($this->periodCache->showOffersByPeriod($period));
    }

    /**
     * destroyOffersByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function destroyOffersByPeriod(Period $period)
    {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Period::class)));
        return $this->success($this->periodCache->destroyOffersByPeriod($period));
    }

    /**
     * showHourhandsByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function showHourhandsByPeriod(Period $period)
    {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Period::class)));
        return $this->success($this->periodCache->showHourhandsByPeriod($period));
    }

    /**
     * destroyHourhandsByPeriod
     *
     * @param  mixed $period
     * @return void
     */
    public function destroyHourhandsByPeriod(Period $period)
    {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Period::class)));
        return $this->success($this->periodCache->destroyHourhandsByPeriod($period));
    }



    /**
     * showPeriodsByClasEduLev
     *
     * @param  mixed $period
     * @return void
     */
    public function showPeriodsByClasEduLev(Period $period)
    {
        return $this->success($this->periodCache->showPeriodsByClasEduLevCache($period));

    }
}
