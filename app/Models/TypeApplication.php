<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeApplication extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'type_applications';
    
    protected $fillable = [
        'typ_app_front_url',
        'typ_app_name',
        'typ_app_description',
        'typ_app_acronym',
        'parent_id',
        'status_id'
    ];

    protected $relations = [
        'status_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at',
        'parent_id',
        'pivot'
    ];

    protected $dates = ['deleted_at'];
    
    /**
     * typeApplication
     *
     * @return HasMany
     */
    public function application() : HasMany {
        return $this->hasMany(Application::class, 'type_application_id');
    }
        
    /**
     * typeApplicationStatus
     *
     * @return HasMany
     */
    public function typeApplicationStatus() : HasMany {
        return $this->hasMany(TypeApplicationStatus::class, 'type_application_id');
    }

    /**
     * configTypeApplication
     *
     * @return HasMany
     */
    public function configTypeApplication() : HasMany {
        return $this->hasMany(ConfigTypeApplication::class);
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
     * children
     *
     * @return void
     */
    public function children() {
        return $this->hasMany(TypeApplication::class, 'parent_id')->with('status')->with('children', 'configTypeApplication')->where(function($query) {
            if (isset(request()->query()['data'])) $query->where('status_id', 1);
        });
    }
}
