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

class TransacTypeApplicationStatusRoles extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'transac_type_application_status_roles';

    protected $fillable = [
        'transac_secuencial',
        'transac_register_date',
        'transac_comments',
        'user',
        'type_application_status_roles_id',
        'status_id',
    ];

    protected $relations = [
        'type_application_status_roles_id',
        'status_id'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];
        
    /**
     * typeApplicationStatusRoles
     *
     * @return BelongsTo
     */
    public function typeApplicationStatusRoles() : BelongsTo {
        return $this->belongsTo(TypeApplicationStatusRoles::class);
    }
}
