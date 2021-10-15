<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeApplicationStatusRoles extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'type_application_status_roles';

    protected $fillable = [
        'role_id',
        'type_application_status_id',
        'status_id'
    ];

    protected $relations = [
        'type_application_status_id',
        'role_id',
        'status_id'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];
        
    /**
     * typeApplicationStatus
     *
     * @return BelongsTo
     */
    public function typeApplicationStatus() : BelongsTo {
        return $this->belongsTo(TypeApplicationStatus::class);
    }
    
    /**
     * roles
     *
     * @return BelongsTo
     */
    public function roles(): BelongsTo {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
