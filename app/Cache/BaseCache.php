<?php

namespace App\Cache;

use Illuminate\Support\Str;
use App\Models\CustomTenant;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Repositories\Contracts\IBaseRepository;

abstract class BaseCache implements IBaseRepository
{

    protected $repository;
    protected $key;
    protected $cache;
    protected $ttl;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Object $baseRepository)
    {
        $key = request()->url();
        $queryParams = request()->query();

        ksort($queryParams);
        $queryString = http_build_query($queryParams);
        $fullUrl = "{$key}?{$queryString}";

        $this->repository = $baseRepository;
        $this->key = $fullUrl;
        $this->cache = new Cache();
        $this->ttl = now()->addMinutes(config('app.ttl_cache'));
    }

    /**
     * forgetCache
     *
     * @param  mixed $resource
     * @return void
     */
    public function forgetCache($resource = NULL)
    {
        $baseUrl  = url('/');
        $tenant = Str::slug(config('app.name'), '_') . '_database_tenant_id_' . CustomTenant::current()->id . ':';
        $content = "{$baseUrl}/api/{$resource}";
        $keys = Redis::connection('cache')->keys("**{$content}**");
        foreach ($keys as $k => $v) {
            $splitKey = explode($tenant, $keys[$k]);
            if (count($splitKey) === 2) $this->cache::forget($splitKey[1]);
        }
        if (!$resource) $this->forgetToken($tenant);
    }

    /**
     * forgetToken
     *
     * @param  mixed $tenant
     * @return void
     */
    public function forgetToken($tenant)
    {
        $content = request()->getHost() . "_find_token";
        $keys = Redis::connection('cache')->keys("**{$content}**");
        foreach ($keys as $k => $v) {
            $splitKey = explode($tenant, $keys[$k]);
            if (count($splitKey) === 2) $this->cache::forget($splitKey[1]);
        }
    }

    /**
     * forgetAllCacheTenant
     *
     * @param  mixed $tenant
     * @return void
     */
    public function forgetAllCacheTenant(CustomTenant $tenant)
    {
        $domain = $tenant->domain;
        $tenant = Str::slug(config('app.name'), '_') . '_database_tenant_id_' . $tenant->id . ':';
        $content = "{$domain}/api";
        $keys = Redis::connection('cache')->keys("**{$content}**");
        foreach ($keys as $k => $v) {
            $splitKey = explode($tenant, $keys[$k]);
            if (count($splitKey) === 2) $this->cache::forget($splitKey[1]);
        }
    }

    /**
     * forgetCacheRoleEdit
     *
     * @param  mixed $resource
     * @return void     
     */
    public function forgetCacheRoleEdit($resource = NULL,$tenant = NULL)
    {
        if(!isset($tenant)||$tenant == NULL) $tenant = CustomTenant::current();
        $URL = Str::slug(config('app.name'), '_') . '_database_tenant_id_' . $tenant->id . ':';
        $content = "{$tenant->domain}/api/middleware_permission?";
        $keys = Redis::connection('cache')->keys("**{$content}**");
        foreach ($keys as $k => $v) {
            $splitKey = explode($URL, $keys[$k]);
            if (count($splitKey) === 2) $this->cache::forget($splitKey[1]);
        }
        if (!$resource) $this->forgetToken($URL);

        $content = "{$tenant->domain}/api/whoami?";
        $keys = Redis::connection('cache')->keys("**{$content}**");
        foreach ($keys as $k => $v) {
            $splitKey = explode($URL, $keys[$k]);
            if (count($splitKey) === 2) $this->cache::forget($splitKey[1]);
        }
        if (!$resource) $this->forgetToken($URL);
    }
}
