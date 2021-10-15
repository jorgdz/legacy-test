<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ApplicationDetail extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'application_details';
    
    protected $fillable = [
        'value',
        'application_id',
        'config_type_application_id',
    ];

    protected $relations = [
        'status_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
        
    /**
     * application
     *
     * @return BelongsTo
     */
    public function application() : BelongsTo {
        return $this->belongsTo(Application::class, 'application_id');
    }
    
    /**
     * configTypeApplication
     *
     * @return BelongsTo
     */
    public function configTypeApplication() : BelongsTo {
        return $this->belongsTo(ConfigTypeApplication::class, 'config_type_application_id');
    }
}
