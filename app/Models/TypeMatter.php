<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeMatter extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection,Auditable;

    protected $table = 'type_matters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tm_name', 'tm_acronym', 'tm_description', 'tm_order', 'tm_cobro', 'tm_matter_count', 'status_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['matters'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * matterStatus
     *
     * @return HasMany
     */
    public function matterStatus() : HasMany {
        return $this->hasMany(MatterStatus::class, 'type_matter_id');
    }
}
