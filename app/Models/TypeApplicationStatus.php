<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeApplicationStatus extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'type_application_status';

    protected $fillable = [
        'order',
        'type_application_id',
        'status_id'
    ];

    protected $relations = [
        'type_application_id',
        'status_id'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];
    
    protected $softCascade = ['typeApplicationStatusRoles'];
    /**
     * typeApplication
     *
     * @return BelongsTo
     */
    public function typeApplication() : BelongsTo {
        return $this->belongsTo(TypeApplication::class);
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }
    
    /**
     * typeApplicationStatusRoles
     *
     * @return HasMany
     */
    public function typeApplicationStatusRoles() : HasMany {
        return $this->hasMany(TypeApplicationStatusRoles::class);
    }
}
