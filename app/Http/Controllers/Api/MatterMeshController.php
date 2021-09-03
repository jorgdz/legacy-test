<?php

namespace App\Http\Controllers\Api;

use App\Cache\MatterMeshCache;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Controllers\Api\Contracts\IMatterMeshController;
use App\Http\Controllers\Controller;
use App\Http\Requests\MatterMeshRequest;
use App\Models\MatterMesh;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MatterMeshController extends Controller implements IMatterMeshController
{
    use RestResponse;

    /**
     * matterMeshCache
     *
     * @var mixed
     */
    private $matterMeshCache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MatterMeshCache $matterMeshCache) {
        $this->matterMeshCache = $matterMeshCache;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->matterMeshCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatterMeshRequest $request)
    {
        $matterMeshFound = MatterMesh::where('matter_id', $request->matter_id)->where('mesh_id', $request->mesh_id)->get();

        if($matterMeshFound) {
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(MatterMesh::class)]));
        }

        $matterMesh = new MatterMesh($request->all());
        $matterMesh = $this->matterMeshCache->save($matterMesh);
        return $this->success($matterMesh, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->success($this->matterMeshCache->find($id), Response::HTTP_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatterMesh $mattermesh)
    {
        $mattermesh->fill($request->all());

        if ($mattermesh->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        return $this->success($this->matterMeshCache->save($mattermesh));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatterMesh $mattermesh)
    {
        return $this->success($this->matterMeshCache->destroy($mattermesh));
    }
}
