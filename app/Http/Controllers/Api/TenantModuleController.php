<?php

namespace App\Http\Controllers\Api;

use App\Models\CustomStatus;
use Illuminate\Http\Request;
use App\Traits\RestResponse;
use App\Models\CustomTenant;
use App\Models\CustomModules;
use App\Models\TenantModules;
use App\Traits\CustomAuditor;
use App\Cache\TenantModuleCache;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\TenantModuleRequest;
use App\Repositories\PermissionRepository;
use App\Exceptions\Custom\ConflictException;
use App\Repositories\TenantModuleRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Api\Contracts\ITenantModuleController;

class TenantModuleController extends Controller implements ITenantModuleController
{
    use RestResponse, CustomAuditor;

    private $repository;
    private $permissionRepository;
    private $tenantModuleCache;
    private $domain;
    private $cache;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        TenantModuleRepository $tenantModuleRepository,
        PermissionRepository $permissionRepository,
        TenantModuleCache $tenantModuleCache
    ) {
        $this->domain = \parse_url(config('app.url'), PHP_URL_HOST);
        $this->repository = $tenantModuleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->tenantModuleCache = $tenantModuleCache;
        $this->cache = new Cache();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->success($this->tenantModuleCache->all($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TenantModuleRequest $request)
    {
        DB::beginTransaction();
        try {
            $tenant_pri = CustomTenant::where('domain', $this->domain)->first();

            if ($request->tenant_id == $tenant_pri->id)
                throw new ModelNotFoundException();

            $request['status_id'] = 4;
            $repository = new TenantModules($request->all());

            $conditionals = [
                ['tenant_id', $request['tenant_id']],
                ['module_id', $request['module_id']]
            ];
            $hasRegister = $this->repository->findByConditionals($conditionals);

            if ($hasRegister) throw new ConflictException(__('messages.exist-instance'));

            $response = $this->tenantModuleCache->save($repository);

            $tenant_cli = CustomTenant::where('id', $request->tenant_id)->first();
            $module = CustomModules::where('id', $request->module_id)->first();

            $conditionals = [
                ['module_group', $module->group]
            ];
            $params = [
                'status_id' => 1,
            ];
            $this->permissionRepository->assignPermissionsByModule($tenant_cli->database, $conditionals, $params);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error($request->getPathInfo(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TenantModules  $tenant_module
     * @return \Illuminate\Http\Response
     */
    public function update(TenantModuleRequest $request, TenantModules $tenant_module)
    {
        DB::beginTransaction();
        try {
            $tenant_pri = CustomTenant::where('domain', $this->domain)->first();

            if ($request->tenant_id == $tenant_pri->id)
                throw new ModelNotFoundException();

            $tenant_module->fill($request->all());

            if ($tenant_module->isClean())
                return $this->information(__('messages.nochange'));

            $status = CustomStatus::where([
                ['id', $request->status_id],
                ['keyword', 'general-inactivo'],
            ])->first();

            $tenant_cli = CustomTenant::where('id', $tenant_module->tenant_id)->first();
            $module = CustomModules::where('id', $tenant_module->module_id)->first();

            $conditionals = [
                ['module_group', $module->group]
            ];
            $params = (!$status) ? array('status_id' => 1) : array('status_id' => 2);

            $response = $this->tenantModuleCache->save($tenant_module);
            $this->permissionRepository->assignPermissionsByModule($tenant_cli->database, $conditionals, $params);

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
     * @param  \App\Models\TenantModules  $tenant_modules
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenantModules $tenant_module)
    {
        DB::beginTransaction();
        try {
            $tenant_pri = CustomTenant::where('domain', $this->domain)->first();

            if ($tenant_module->tenant_id == $tenant_pri->id)
                throw new ModelNotFoundException();

            $response = $this->tenantModuleCache->destroy($tenant_module);

            $tenant_cli = CustomTenant::where('id', $tenant_module->tenant_id)->first();
            $module = CustomModules::where('id', $tenant_module->module_id)->first();

            $conditionals = [
                ['module_group', $module->group]
            ];
            $params = [
                'status_id' => 2,
            ];

            $this->permissionRepository->assignPermissionsByModule($tenant_cli->database, $conditionals, $params);

            DB::commit();
            return $this->success($response);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * EnableTenantModule
     *
     * @param  mixed $id
     * @return void
     */
    public function EnableTenantModule($id)
    {
        DB::beginTransaction();
        try {
            $tenant_pri = CustomTenant::where('domain', $this->domain)->first();
            $tenant_mod = DB::connection('landlord')->table('tenant_modules')
                ->whereNotNull('deleted_at')
                ->where('id', $id)
                ->first();

            if (!$tenant_mod)
                throw new ConflictException(__('messages.no-exist-instance-resource'));

            if ($tenant_mod->tenant_id == $tenant_pri->id)
                throw new ModelNotFoundException();

            TenantModules::withTrashed()->find($tenant_mod->id)->restore();

            $tenant_cli = CustomTenant::where('id', $tenant_mod->tenant_id)->first();
            $module = CustomModules::where('id', $tenant_mod->module_id)->first();

            $conditionals = [
                ['module_group', $module->group]
            ];
            $params = [
                'status_id' => 1,
            ];

            $this->permissionRepository->assignPermissionsByModule($tenant_cli->database, $conditionals, $params);
            $this->tenantModuleCache->clearCache();

            DB::commit();
            return $this->success($tenant_cli);
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->error(request()->path(), $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
