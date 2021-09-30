<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TenantModules extends Tenant implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    protected $table = 'tenant_modules';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'tenant_id',
        'module_id',
        'status_id',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * tenant
     *
     * @return void
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(CustomTenant::class, 'tenant_id');
    }

    /**
     * module
     *
     * @return BelongsTo
     */
    public function module(): BelongsTo
    {
        return $this->belongsTo(CustomModules::class, 'module_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(CustomStatus::class, 'status_id');
    }
}
