<?php

namespace App\Http\Controllers\Api;

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

class TenantController extends Controller implements ITenantController
{

    use RestResponse;
    private $domain;
    protected $key;
    protected $cache;


    public function __construct() {
        $this->domain = \parse_url(config('app.url'), PHP_URL_HOST);
        $key = request()->url();
        $queryParams = request()->query();
        ksort($queryParams);
        $queryString = http_build_query($queryParams);
        $fullUrl = "{$key}?{$queryString}";
        $this->key = $fullUrl;
        $this->cache = new Cache();
    }

    private function getTenantCached(Request $request, $search){//page,size,search
        if($search == ''){
            $tenant = $this->cache::remember($this->key, now()->addMinutes(120), function () use ($request) {
                return CustomTenant::where('domain', '<>', $this->domain)
                    ->orderBy('id', 'desc')
                    ->paginate($request->size ?: 10);
            });
        }else{
            $tenant = $this->cache::remember($this->key, now()->addMinutes(120), function () use ($search) {
                return CustomTenant::where('domain', '<>', $this->domain)
                    ->where('name', $search)
                    ->orWhere('domain', $search )
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

        $tenant = $this->getTenantCached($request,$search);

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
            'name' => 'alpha_dash|unique:landlord.tenants,name,'.$tenant,
            'domain' => 'unique:landlord.tenants,domain,'.$tenant,
            'domain_client' => 'unique:landlord.tenants,domain_client,'.$tenant,
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
        //$this->cache::forget($request->getHost() . '_current_tenant');
        $this->cache::flush();

        $tenantUpdate = CustomTenant::findOrFail(app('currentTenant')->id);
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
    public function updateLogoCurrentTenant (UpdateLogoCurrentTenantRequest $request) {
        $this->cache::forget($request->getHost() . '_current_tenant');
        $tenantUpdate = CustomTenant::findOrFail(app('currentTenant')->id);

        if($request->hasFile('logo')) {
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();

            $filename = $tenantUpdate->id.'.'.$extension;//.'_'.time().

            Storage::put($filename, FileFacade::get($request->file('logo')));

            $tenantUpdate->logo_name = $filename;

            $tenantUpdate->logo_path = url('/').'/storage/'.$tenantUpdate->name.'/'.$filename;
            
            $tenantUpdate->save();
        }

        $this->cache::forget(request()->root() . '/api/as-tenant_as_current_tenant');

        return $this->success($tenantUpdate);
    } 
}
