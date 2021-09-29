<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\FailLocalStorageRequestException;
use App\Models\Mail;
use App\Jobs\ProcessTenant;
use Illuminate\Support\Str;
use App\Models\CustomTenant;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateTenantRequest;
use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Api\Contracts\ITenantController;
use App\Http\Requests\UpdateLogoCurrentTenantRequest;
use App\Services\FilesystemService;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller implements ITenantController
{
    use RestResponse;

    private $domain;
    protected $key;
    protected $cache;

    private $filesystemService;
    
    /**
     * __construct
     *
     * @param  mixed $filesystemService
     * @return void
     */
    public function __construct(FilesystemService $filesystemService) {
        $this->domain = \parse_url(config('app.url'), PHP_URL_HOST);
        $key = request()->url();
        $queryParams = request()->query();
        ksort($queryParams);
        $queryString = http_build_query($queryParams);
        $fullUrl = "{$key}?{$queryString}";
        $this->key = $fullUrl;
        $this->cache = new Cache();
        $this->filesystemService = $filesystemService;
    }
    
    /**
     * getTenantCached
     *
     * @param  mixed $request
     * @param  mixed $search
     * @return void
     */
    private function getTenantCached(Request $request, $search) {
        if ($search == '') {
            $tenant = $this->cache::remember($this->key, now()->addMinutes(120), function () use ($request) {
                return CustomTenant::where('domain', '<>', $this->domain)
                    ->orderBy('id', 'desc')
                    ->paginate($request->size ?: 10);
            });
        } else {
            $tenant = $this->cache::remember($this->key, now()->addMinutes(120), function () use ($search) {
                return CustomTenant::where('domain', '<>', $this->domain)
                    ->where('name', $search)
                    ->orWhere('domain', $search)
                    ->orWhere('domain_client', $search)
                    ->first();
            });
        }
        return $tenant;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $search = $request->search ?: '';

        $tenant = $this->getTenantCached($request, $search);

        return $this->success($tenant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'name' => ['required', 'alpha_dash', 'unique:landlord.tenants', 'max:255'],
            'domain' => ['required', 'unique:landlord.tenants', 'max:255'],
            'domain_client' => ['required', 'unique:landlord.tenants', 'max:255'],
            'database' => ['required', 'max:255'],

            'description' => ['max:255'],
            'website' => ['max:255'],
            'assigned_site' => ['max:255'],
            'facebook' => ['max:255'],
            'instagram' => ['max:255'],
            'linkedin' => ['max:255'],
            'youtube' => ['max:255'],
            'info_mail' => ['required', 'email', 'unique:landlord.tenants', 'max:255'],
            'matrix' => ['max:255'],
            'color' => ['max:255'],
            'students_number'=> ['max:255'],

        ];

        $request->validate($rules);

        $tenant = CustomTenant::create($request->all());

        ProcessTenant::dispatch($tenant)->onConnection('landlord');

        return $this->success($tenant, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CustomTenant $tenant) {
        $tenant_main = CustomTenant::where('domain', $this->domain)->first();

        if ($tenant->id == $tenant_main->id)
            throw new ModelNotFoundException();

        return $this->success($tenant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tenant) {
        $rules = [
            'name' => 'alpha_dash|unique:landlord.tenants,name,' . $tenant,
            'domain' => 'unique:landlord.tenants,domain,' . $tenant,
            'domain_client' => 'unique:landlord.tenants,domain_client,' . $tenant,

            'description' => 'max:255',
            'website' => 'max:255',
            'assigned_site' => 'max:255',
            'facebook' => 'max:255',
            'instagram' => 'max:255',
            'linkedin' => 'max:255',
            'youtube' => 'max:255',
            'info_mail' => 'required|email|max:255|unique:landlord.tenants,info_mail,' . $tenant,
            'matrix' => 'max:255',
            'color' =>  'max:255',
            'students_number'=> ['max:255'],
        ];

        $this->validate($request, $rules);

        $tenant = CustomTenant::findOrFail($tenant);

        $tenant->fill($request->all());

        if ($tenant->isClean())
            $this->information(__('messages.nochange'));

        $tenant->save();

        return $this->success($tenant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomTenant $tenant) {
        $tenant_main = CustomTenant::where('domain', $this->domain)->first();

        if ($tenant->id == $tenant_main->id)
            throw new ModelNotFoundException();

        $tenant->delete();
        $this->cache::flush();
        return $this->success($tenant);
    }

    /**
     * Update tenant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCurrentTenant(UpdateTenantRequest $request) {
        /* $this->cache::forget($request->getHost() . '_current_tenant'); */
        $this->cache::flush();

        $tenantUpdate = CustomTenant::findOrFail(CustomTenant::current()->id);
        $mailUpdate = Mail::find($tenantUpdate->mail->id);

        $tenantUpdate->fill($request->only('name'));
        $mailUpdate->fill($request->except('name'));

        if ($tenantUpdate->isClean() && $mailUpdate->isClean())
            return $this->information(__('messages.nochange'));

        $tenantUpdate->save();
        $mailUpdate->save();
        return $this->success($tenantUpdate);
    }

    /**
     * updateLogoCurrentTenant
     *
     * @param  mixed $request
     * @return \Illuminate\Http\Response
     */
    public function updateLogoCurrentTenant(UpdateLogoCurrentTenantRequest $request) {
        /* $this->cache::forget($request->getHost() . '_current_tenant'); */
        $this->cache::flush();
        $tenantUpdate = CustomTenant::findOrFail(CustomTenant::current()->id);

        /* enviar el archivo a guardar */
        $response = $this->filesystemService->store($request);

        if (empty($response))
            throw new FailLocalStorageRequestException(__("messages.no-content"));

        $tenantUpdate->logo_name = $response[0]['name'];

        $tenantUpdate->logo_path = $response[0]['route'];

        $tenantUpdate->save();

        $this->cache::forget(request()->root() . '/api/as-tenant_as_current_tenant');

        return $this->success($tenantUpdate);
    }

    
    /**
     * restoreTenant
     *
     * @param  mixed $tenant
     * @return void
     */
    public function restoreTenant($id) {
        $tenant_pri = CustomTenant::where('domain', $this->domain)->first();
        $tenant_cli = DB::connection('landlord')->table('tenants')
            ->whereNotNull('deleted_at')
            ->where('id', $id)
            ->first();

        if (!$tenant_cli) 
            throw new ConflictException(__('messages.no-exist-instance-resource'));

        if ($tenant_cli->id == $tenant_pri->id) 
            throw new ModelNotFoundException();

        CustomTenant::withTrashed()->find($tenant_cli->id)->restore();
        $this->cache::flush();

        return $this->success($tenant_cli);
    }
}
