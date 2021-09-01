<?php

namespace App\Http\Controllers\Api;

use App\Cache\ParallelCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IParallelController;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParallelFormRequest;
use App\Models\Parallel;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParallelController extends Controller implements IParallelController
{
    use RestResponse;

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

    public function index(Request $request)
    {
        return $this->success($this->parallelCache->all($request));
    }

    public function store(ParallelFormRequest $request)
    {
        $parallel = new Parallel($request->all());
        $parallel = $this->parallelCache->save($parallel);
        return $this->success($parallel, Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->parallelCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parallel $parallel)
    {
        $parallel->fill($request->all());

        if ($parallel->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        return $this->success($this->parallelCache->save($parallel));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parallel $parallel)
    {
        return $this->success($this->parallelCache->destroy($parallel));
    }


}
