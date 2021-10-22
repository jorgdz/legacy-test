<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Spatie\Permission\Models\Permission as PermissionPersonalized;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Permission extends PermissionPersonalized implements AuditableContract
{
    use HasFactory, SoftDeletes, UsesTenantConnection,Auditable;

    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'alias' ,'description', 'guard_name', 'parent_name','parent_name_translated', 'module_group', 'status_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    /* Relationships */
    public function status () {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
