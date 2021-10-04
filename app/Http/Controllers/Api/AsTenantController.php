<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Api\Contracts\IAsTenantController;
use App\Http\Resources\TenantResource;
use App\Models\CustomTenant;

/**
 * Show current tenant
 */
class AsTenantController extends Controller implements IAsTenantController
{
    /**
     * asTenant
     *
     * @param  mixed $request
     * @return void
     */
    public function asTenant (Request $request) {
        $key = request()->url().'_as_current_tenant';

        return Cache::remember($key, now()->addMinutes(150), function () {
            return response()->json(new TenantResource(CustomTenant::findOrFail(CustomTenant::current()->id)));
        });
    }
}
