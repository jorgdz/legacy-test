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

class Application extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'applications';

    protected $fillable = [
        'app_code',
        'app_description',
        'app_register_date',
        'type_application_id',
        'user_id',
        'status_id'
    ];

    protected $relations = [
        'user_id',
        'type_application_id',
        'status_id'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['applicationDetail'];
        
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
     * applicationDetail
     *
     * @return HasMany
     */
    public function applicationDetail() : HasMany {
        return $this->hasMany(ApplicationDetail::class);
    }
    
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
}