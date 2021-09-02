<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\RestResponse;
use App\Models\TypeCalification;
use Illuminate\Support\Facades\DB;
use App\Cache\TypeCalificationCache;
use App\Http\Controllers\Controller;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Requests\StoreTypeCalificationRequest;
use App\Http\Requests\UpdateTypeCalificationRequest;
use App\Http\Controllers\Api\Contracts\ITypeCalificationController;

class TypeCalificationController extends Controller implements ITypeCalificationController
{
    use RestResponse;

    private $typeCalificationCache;

    public function __construct(TypeCalificationCache $typeCalificationCache) {
        $this->typeCalificationCache = $typeCalificationCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->typeCalificationCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeCalificationRequest $request) {
        DB::beginTransaction();
        try {
            $tc = new TypeCalification($request->all());
            $tc = $this->typeCalificationCache->save($tc);

            DB::commit();
            return $this->success($tc, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex,
                    __('messages.internal-server-error'), Response::HTTP_CONFLICT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->typeCalificationCache->find($id), Response::HTTP_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeCalificationRequest $request, TypeCalification $typeCalification) {
        DB::beginTransaction();
        try {
            $typeCalification->fill($request->all());

            if ($typeCalification->isClean())
                throw new UnprocessableException(__('messages.nochange'));

            $response = $this->typeCalificationCache->save($typeCalification);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex,
                    __('messages.internal-server-error'), Response::HTTP_CONFLICT);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeCalification $typeCalification) {
        DB::beginTransaction();
        try {
            $response = $this->typeCalificationCache->destroy($typeCalification);
            DB::commit();
            return $this->success($response);
        } catch (ConflictException $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex,
                    __('messages.internal-server-error'), Response::HTTP_CONFLICT);
        }
    }
}
