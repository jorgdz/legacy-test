<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Permission\Models\Role as RolePersonalized;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Role extends RolePersonalized
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    /* protected $table = 'roles'; */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'guard_name', 'status_id'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status () : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * positions
     *
     * @return HasOne
     */
    public function position() : HasOne
    {
        return $this->hasOne(Position::class, 'role_id');
    }
}
