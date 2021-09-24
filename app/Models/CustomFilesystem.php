<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CustomFilesystem extends Tenant implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'filesystems';

    protected $fillable = ['user_id', 'client_id', 'token', 'tenant_id'];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * tenant
     *
     * @return BelongsTo
     */
    public function tenant() : BelongsTo {
        return $this->belongsTo(CustomTenant::class, 'tenant_id');
    }
}
