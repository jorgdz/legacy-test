<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CustomFilesystem extends Tenant implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'filesystems';

    protected $fillable = ['user_id', 'client_id', 'token', 'tenant_id'];

    protected $hidden = ['created_at', 'updated_at'];

    /* Relationships */
    public function tenant() {
        return $this->belongsTo(CustomTenant::class, 'tenant_id');
    }
}
