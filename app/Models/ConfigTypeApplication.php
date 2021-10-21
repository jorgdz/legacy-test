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
use phpDocumentor\Reflection\Types\Boolean;

class ConfigTypeApplication extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'config_type_applications';
    
    protected $fillable = [
        'conf_typ_description',
        'conf_typ_data_type',
        'conf_typ_object_name',
        'conf_typ_object_id',
        'conf_typ_file_path',
        'type_application_id',
        'conf_typ_object_hidden',
        'status_id'
    ];

    protected $relations = [
        'type_application_id',
        'status_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
    
    /**
     * applicationDetail
     *
     * @return HasMany
     */
    public function applicationDetail () : HasMany {
        return $this->hasMany(ApplicationDetail::class);
    }
        
    /**
     * typeApplication
     *
     * @return BelongsTo
     */
    public function typeApplication() : BelongsTo {
        return $this->belongsTo(TypeApplication::class, 'type_application_id');
    }
    
    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    //Parseo
    public function getConfTypObjectHiddenAttribute () {
        return (Boolean) ($this->attributes['conf_typ_object_hidden']);
    }
    public function getStatusIdAttribute () {
        return (int) ($this->attributes['status_id']);
    }

    public function getTypeApplicationIdAttribute () {
        return (int) ($this->attributes['type_application_id']);
    }
    

}
