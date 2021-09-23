<?php

namespace App\Http\Controllers\Api;

use App\Models\TypeMatter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\RestResponse;
use App\Cache\TypeMatterCache;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Exceptions\Custom\ConflictException;
use App\Http\Requests\StoreTypeMatterRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\ITypeMatterController;

class TypeMatterController extends Controller implements ITypeMatterController
{
    use RestResponse;

    private $typeMatterCache;

    public function __construct(TypeMatterCache $typeMatterCache) {
        $this->typeMatterCache = $typeMatterCache;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->typeMatterCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeMatterRequest $request) {
        DB::beginTransaction();
        try {
            $tm = new TypeMatter($request->all());
            $tm = $this->typeMatterCache->save($tm);

            DB::commit();
            return $this->success($tm);
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
        return $this->success($this->typeMatterCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeMatterRequest $request, TypeMatter $typeMatter) {
        DB::beginTransaction();
        try {
            $typeMatter->fill($request->all());

            if ($typeMatter->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->typeMatterCache->save($typeMatter);

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
    public function destroy(TypeMatter $typeMatter) {
        DB::beginTransaction();
        try {
            $response = $this->typeMatterCache->destroy($typeMatter);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
