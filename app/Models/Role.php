<?php

namespace App\Models;

use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as RolePersonalized;
use Illuminate\Database\Eloquent\Model;

class Role extends RolePersonalized
{
    use HasFactory, UsesTenantConnection;

    protected $table = 'role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'guard_name', 'status_id'];
}
