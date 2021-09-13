<?php

namespace App\Cache;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Repositories\Contracts\IBaseRepository;

abstract class BaseCache implements IBaseRepository {

    protected $repository;
    protected $key;
    protected $cache;
    protected $ttl;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Object $baseRepository) {
        $key = request()->url();
        $queryParams = request()->query();

        ksort($queryParams);
        $queryString = http_build_query($queryParams);
        $fullUrl = "{$key}?{$queryString}";

        $this->repository = $baseRepository;
        $this->key = $fullUrl;
        $this->cache = new Cache();
        $this->ttl = now()->addMinutes(env('TTL_CACHE'));
    }

    public function forgetCache($resource = NULL) {
        $baseUrl  = url('/');
        $tenant = Str::slug(env('APP_NAME', 'sistema_de_planificacion_de_recursos'), '_') . '_database_tenant_id_' . app('currentTenant')->id . ':';
        $content = "{$baseUrl}/api/{$resource}";
        $keys = Redis::connection('cache')->keys("**{$content}**");
        foreach ($keys as $k => $v) {
            $splitKey = explode($tenant, $keys[$k]);
            if (count($splitKey) === 2) $this->cache::forget($splitKey[1]);
        }
        if (!$resource) $this->forgetToken($tenant);
    }

    public function forgetToken($tenant) {
        $content = request()->getHost() . "_find_token";
        $keys = Redis::connection('cache')->keys("**{$content}**");
        foreach ($keys as $k => $v) {
            $splitKey = explode($tenant, $keys[$k]);
            if (count($splitKey) === 2) $this->cache::forget($splitKey[1]);
        }
    }
}
