<?php

namespace App\Http\Controllers\Api;

use App\Cache\ParallelCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IParallelController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParallelFormRequest;
use App\Http\Requests\UpdateParallelRequest;
use App\Models\Parallel;
use App\Traits\Auditor;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParallelController extends Controller implements IParallelController
{
    use RestResponse, Auditor;

    private $parallelCache;

    /**
     * __construct
     *
     * @param  mixed $companyCache
     * @return void
     */
    public function __construct(ParallelCache $parallelCache)
    {
        $this->parallelCache = $parallelCache;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->parallelCache->all($request));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(ParallelFormRequest $request)
    {
        $parallel = new Parallel($request->all());
        $parallel = $this->parallelCache->save($parallel);
        return $this->success($parallel, Response::HTTP_CREATED);

    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->success($this->parallelCache->find($id));
    }

   /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $parallel
    * @return void
    */
   public function update(UpdateParallelRequest $request, Parallel $parallel)
    {
        $parallel->fill($request->all());

        if ($parallel->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->parallelCache->save($parallel));
    }


    /**
     * destroy
     *
     * @param  mixed $parallel
     * @return void
     */
    public function destroy(Parallel $parallel)
    {
        return $this->success($this->parallelCache->destroy($parallel));
    }

    /**
     * enabled
     *
     * @param  mixed $parallel
     * @return void
     */
    public function enabled(Parallel $parallel)
    {
        if($parallel->status_id == 1)
            throw new UnprocessableException(__('messages.is-active'));

        $parallel->status_id = 1;
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Parallel::class)));
        return $this->success($this->parallelCache->save($parallel));
    }

    /**
     * disabled
     *
     * @param  mixed $parallel
     * @return void
     */
    public function disabled(Parallel $parallel)
    {
        if($parallel->status_id == 2)
            throw new UnprocessableException(__('messages.is-inactive'));

        $parallel->status_id = 2;
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(Parallel::class)));
        return $this->success($this->parallelCache->save($parallel));
    }


}
