<?php

namespace App\Finder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\TenantFinder\TenantFinder;
use Spatie\Multitenancy\Models\Concerns\UsesTenantModel;

class CustomDomainTenantFinder extends TenantFinder
{
    use UsesTenantModel;

    public function findForRequest(Request $request):?Tenant
    {
        $host = $request->getHost();

        $key = $host . '_current_tenant';

        return Cache::remember($key, now()->addMinutes(150), function () use ($host) {
            return $this->getTenantModel()::with('mail')
                ->whereDomain($host)->first();
        });
    }
}
