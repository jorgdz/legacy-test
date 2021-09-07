<?php

namespace App\Http\Controllers\Api;

use App\Models\Pensum;
use App\Cache\PensumCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePensumRequest;
use App\Http\Requests\UpdatePensumRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IPensumController;

class PensumController extends Controller implements IPensumController
{
    use RestResponse;

    private $pensumCache;

    public function __construct(PensumCache $pensumCache) {
        $this->pensumCache = $pensumCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->pensumCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePensumRequest $request) {
        DB::beginTransaction();
        try {
            $pensum = new Pensum($request->all());
            $pensum = $this->pensumCache->save($pensum);

            DB::commit();
            return $this->success($pensum, Response::HTTP_CREATED);
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
        return $this->success($this->pensumCache->find($id), Response::HTTP_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePensumRequest $request, Pensum $pensum) {
        DB::beginTransaction();
        try {
            $pensum->fill($request->all());

            if ($pensum->isClean())
                throw new UnprocessableException(__('messages.nochange'));

            $response = $this->pensumCache->save($pensum);

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
    public function destroy(Pensum $pensum) {
        DB::beginTransaction();
        try {
            $response = $this->pensumCache->destroy($pensum);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
