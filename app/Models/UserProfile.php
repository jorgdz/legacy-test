<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class UserProfile extends Model implements AuditableContract
{
    use HasFactory, HasRoles, UsesTenantConnection, SoftDeletes, SoftCascadeTrait,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'user_profiles';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'profile_id', 'status_id'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * guard_name
     *
     * @var string
     */
    protected $guard_name = 'api';

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['user_id', 'profile_id', 'status_id'];

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * profile
     *
     * @return BelongsTo
     */
    public function profile () : BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status () : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
