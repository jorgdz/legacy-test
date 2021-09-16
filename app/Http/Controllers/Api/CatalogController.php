<?php

namespace App\Http\Controllers\Api;

use App\Models\Catalog;
use App\Cache\CatalogCache;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\ICatalogController;
use App\Http\Requests\CatalogRequest;

class CatalogController extends Controller implements ICatalogController
{
    use RestResponse;

    private $catalogCache;

    public function __construct(CatalogCache $catalogCache) {
        $this->catalogCache = $catalogCache;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $request['conditions'] = [
            ['parent_id', NULL],
        ];
        return $this->success($this->catalogCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogRequest $request) {
        DB::beginTransaction();
        try {
            $catalog = new Catalog($request->all());
            $catalog = $this->catalogCache->save($catalog);

            DB::commit();
            return $this->success($catalog, Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->catalogCache->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(CatalogRequest $request, Catalog $catalog) {
        DB::beginTransaction();
        try {
            $catalog->fill($request->all());

            if ($catalog->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->catalogCache->save($catalog);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
