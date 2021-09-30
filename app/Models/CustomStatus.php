<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class CustomStatus extends Tenant implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'status';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = ['created_at', 'updated_at'];
    
    /**
     * tenant
     *
     * @return void
     */
    public function tenants(): HasMany {
        return $this->hasMany(CustomTenant::class, 'status_id');
    }
    
    /**
     * modules
     *
     * @return void
     */
    public function modules(): HasMany {
        return $this->hasMany(CustomModules::class, 'status_id');
    }
    
    /**
     * tenant_modules
     *
     * @return void
     */
    public function tenant_modules(): HasMany {
        return $this->hasMany(TenantModules::class, 'status_id');
    }
}
