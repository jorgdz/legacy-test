<?php

namespace App\Http\Controllers\Api;

use App\Cache\HourSummaryCache;
use App\Http\Controllers\Api\Contracts\IHourSummaryController;
use App\Http\Controllers\Controller;
use App\Http\Requests\HourSummaryFormRequest;
use App\Traits\ValidationHourSummary;
use App\Models\HourSummary;
use App\Traits\RestResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HourSummaryController extends Controller implements IHourSummaryController
{

    use RestResponse, ValidationHourSummary;

    private $hourSummaryCache;

    public function __construct(HourSummaryCache $hourSummaryCache)
    {
        $this->hourSummaryCache = $hourSummaryCache;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->hourSummaryCache->all($request));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HourSummaryFormRequest $request)
    {

        $hourSumm = new HourSummary($request->all());

        $sum_hour = $this->validationCollaborator($hourSumm);

        $hourSumm->hs_total = $sum_hour;

        $hourSumm = $this->hourSummaryCache->save($hourSumm);

        $hourSumm->hs_total = $sum_hour;
        return $this->success($hourSumm, Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->hourSummaryCache->find($id));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HourSummaryFormRequest $request, HourSummary $hourSummary)
    {
        DB::beginTransaction();
        try {
            $hourSummary->fill($request->all());

            if ($hourSummary->isClean())
                return $this->information(__('messages.nochange'));

            $sum_hour = $this->validationCollaborator($hourSummary);

            $hourSummary->hs_total = $sum_hour;

            $response = $this->hourSummaryCache->save($hourSummary);

            DB::commit();

            $response->hs_total = $sum_hour;
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
    public function destroy(HourSummary $hourSummary)
    {
        DB::beginTransaction();
        try {
            $response = $this->hourSummaryCache->destroy($hourSummary);
            DB::commit();
            return $this->success($response);
        } catch (Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
