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

        $status = CustomStatus::whereIn('keyword', ['acceso-activo', 'acceso-fata_pago'])->get()->pluck('id')->toArray();
        
        return Cache::remember($key, now()->addMinutes(150), function () use ($host, $status) {
            return $this->getTenantModel()::with(['mail', 'status'])
                ->whereIn('status_id', $status)
                ->whereDomain($host)->first();
        });
    }
}
