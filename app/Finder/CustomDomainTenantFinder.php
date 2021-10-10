<?php

namespace App\Finder;

use App\Models\CustomStatus;
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
            return $this->getTenantModel()::with(['mail', 'status'])
                ->whereHas('status', function ($query) {
                    $query->whereIn('keyword', ['acceso-activo', 'acceso-fata_pago']);
                })
                ->whereDomain($host)->first();
        });
    }
}
