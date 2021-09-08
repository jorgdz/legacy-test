<?php

namespace App\Http\Controllers\Api;

use App\Models\Mesh;
use App\Cache\MeshCache;
use App\Exceptions\Custom\UnprocessableException;
use App\Traits\RestResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\MeshRequest;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Api\Contracts\IMeshsController;

class MeshsController extends Controller implements IMeshsController
{
    use RestResponse;

    private $meshCache;

    public function __construct(MeshCache $meshCache)
    {
        $this->meshCache = $meshCache;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->meshCache->all($request));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeshRequest $request)
    {
        DB::beginTransaction();
        try {
            $mesh = new Mesh($request->all());
            $mesh = $this->meshCache->save($mesh);

            DB::commit();
            return $this->success($mesh, Response::HTTP_CREATED);
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
    public function show(Request $request,$id)
    {

        return $this->success($this->meshCache->find($id));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MeshRequest $request, Mesh $mesh)
    {
        DB::beginTransaction();
        try {
            $mesh->fill($request->all());

            if ($mesh->isClean())
                return $this->information(__('messages.nochange'));

            $response = $this->meshCache->save($mesh);

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
    public function destroy(Mesh $mesh)
    {
        DB::beginTransaction();
        try {
            $response = $this->meshCache->destroy($mesh);
            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());

        }
    }


}
