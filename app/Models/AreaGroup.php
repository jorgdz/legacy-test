<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class AreaGroup extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'group_areas';

    protected $fillable = ['arg_name', 'arg_description', 'arg_keywords', 'status_id'];

    protected $relations = ['status_id'];

    protected $dates = ['deleted_at'];

    protected $softCascade = [
        'groupAreaSubjects'
    ];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * groupAreaSubjects
     *
     * @return HasMany
     */
    public function groupAreaSubjects () : HasMany {
        return $this->hasMany(GroupAreaSubject::class, 'group_nivelation_id');
    }

    public function educationLevels () : HasMany {
        return $this->hasMany(EducationLevel::class, 'group_area_id');
    }
}
