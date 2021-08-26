<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as RolePersonalized;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Role extends RolePersonalized
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $table = 'role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'guard_name', 'status_id'];

    protected $dates = ['deleted_at'];
}
