<?php

namespace App\Http\Controllers\Api;

use App\Cache\MatterMeshCache;
use App\Exceptions\Custom\ConflictException;
use App\Http\Controllers\Api\Contracts\IMatterMeshController;
use App\Http\Controllers\Controller;
use App\Http\Requests\MatterMeshDependenciesRequest;
use App\Http\Requests\MatterMeshRequest;
use App\Http\Requests\UpdateMatterMeshRequest;
use App\Models\MatterMesh;
use App\Repositories\MeshRepository;
use App\Traits\Auditor;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatterMeshController extends Controller implements IMatterMeshController
{
    use RestResponse, Auditor;

    /**
     * matterMeshCache
     *
     * @var mixed
     */
    private $matterMeshCache;
    private $meshRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (MatterMeshCache $matterMeshCache, MeshRepository $meshRepository) {
        $this->matterMeshCache = $matterMeshCache;
        $this->meshRepository  = $meshRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        return $this->success($this->matterMeshCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatterMeshRequest $request) {
        $conditionals = [
            ['id', $request->mesh_id]
        ];
        $meshs = $this->meshRepository->findByConditionals($conditionals);

        if (!$meshs) {
            throw new ConflictException(__('messages.no-exist-instance-resource'));
        } elseif (count($meshs['matter_mesh']) >= $meshs['mes_number_matter']) {
            throw new ConflictException(__('messages.max', ['max' => $meshs['mes_number_matter']]));
        }

        $data = DB::connection('tenant')->table('matter_mesh')
                ->whereNotNull('deleted_at')
                ->where('matter_id', $request->matter_id)
                ->where('mesh_id', $request->mesh_id)
                ->first();

        if ($data) {
            MatterMesh::withTrashed()->find($data->id)->restore();

            $mattermesh = MatterMesh::findOrFail($data->id);
            $mattermesh->fill($request->all());
            $mattermesh->save();

            return $this->information(__('messages.success'));
        }

        $matterMeshFound = MatterMesh::where('matter_id', $request->matter_id)->where('mesh_id', $request->mesh_id)->first();

        if($matterMeshFound) {
            throw new ConflictException(__('messages.exist-instance'));
        }

        $matterMesh = new MatterMesh($request->all());
        return $this->success($this->matterMeshCache->save($matterMesh));
    }

    /**
     * asignDependencies
     *
     * @param  mixed $request
     * @param  mixed $mattermesh
     * @return void
     */
    public function asignDependencies(MatterMeshDependenciesRequest $request, MatterMesh $mattermesh) {
        $mattermesh->matterMeshDependencies()->sync($request->matterMesh);
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(MatterMesh::class)));
        return $this->success($this->matterMeshCache->save($mattermesh));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->success($this->matterMeshCache->find($id));
    }

    /**
     * showDependencies
     *
     * @param  mixed $mattermesh
     * @return void
     */
    public function showDependencies(MatterMesh $mattermesh) {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(MatterMesh::class)));
        return $this->success($this->matterMeshCache->showDependencies($mattermesh));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MatterMeshRequest  $request
     * @param  mixed  $mattermesh
     * @return \Illuminate\Http\Response
     */
    public function update(MatterMeshRequest $request, MatterMesh $mattermesh) {
        $mattermesh->fill($request->all());

        if ($mattermesh->isClean())
            return $this->information(__('messages.nochange'));

        return $this->success($this->matterMeshCache->save($mattermesh));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatterMesh $mattermesh) {
        return $this->success($this->matterMeshCache->destroy($mattermesh));
    }

    /**
     * restoreMatterMesh
     *
     * @param  mixed $mattermesh
     * @return void
     */
    public function restoreMatterMesh(Request $request, $id) {
        MatterMesh::withTrashed()->find($id)->restore();
        return $this->information(__('messages.success'));
    }

    /**
     * show Prerequisites matter mesh
     *
     * @param  mixed $mattermesh
     * @return void
     */
    public function showPrerequisites(MatterMesh $mattermesh) {
        $this->setAudit($this->formatToAudit(__FUNCTION__, class_basename(MatterMesh::class)));
        return $this->success($this->matterMeshCache->showPrerequisites($mattermesh));
    }
}
