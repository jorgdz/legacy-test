<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Spatie\Permission\Models\Permission as PermissionPersonalized;
use Illuminate\Support\Str;

class Permission extends PermissionPersonalized
{
    use HasFactory, SoftDeletes, UsesTenantConnection;

    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'alias' ,'description', 'guard_name', 'parent_name', 'status_id'];

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];
    /**
     * status
     *
     * @return void
     */
    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
