<?php

namespace App\Cache;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use App\Repositories\Contracts\IBaseRepository;

abstract class BaseCache implements IBaseRepository {

    const TTL = 86400;
    protected $repository;
    protected $key;
    protected $cache;

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
    }

    public function forgetCache($resource) {
        $baseUrl  = url('/');
        $tenant = Str::slug(env('APP_NAME', 'sistema_de_planificacion_de_recursos'), '_') . '_database_tenant_id_' . app('currentTenant')->id . ':';
        $content = "{$baseUrl}/api/{$resource}";
        $keys = Redis::connection('cache')->keys("**{$content}**");
        for ($i=0; $i < sizeof($keys); $i++) { 
            $splitKey = explode($tenant, $keys[$i]);
            $this->cache::forget($splitKey[1]);
        }
    }
}
