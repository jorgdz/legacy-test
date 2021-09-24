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

class Matter extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'matters';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['type_matter_id', 'type_calification_id', 'education_level_id','status_id'];

    /**
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['matterMesh'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mat_name',
        'mat_description',
        'mat_acronym',
        'cod_matter_migration',
        'cod_old_migration',
        'type_matter_id',
        'type_calification_id',
        'education_level_id',
        'min_note',
        'status_id'
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * typeMatter
     *
     * @return BelongsTo
     */
    public function typeMatter() : BelongsTo {
        return $this->belongsTo(TypeMatter::class, 'type_matter_id');
    }

    /**
     * typeCalification
     *
     * @return BelongsTo
     */
    public function typeCalification() : BelongsTo {
        return $this->belongsTo(TypeCalification::class, 'type_calification_id');
    }

    /**
     * educationLevel
     *
     * @return BelongsTo
     */
    public function educationLevel() : BelongsTo {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    /**
     * matterMesh
     *
     * @return HasMany
     */
    public function matterMesh() : HasMany
    {
        return $this->hasMany(MatterMesh::class);
    }

    /**
     * courses
     *
     * @return void
     */
    // public function courses()
    // {
    //     return $this->hasMany(Course::class, 'matter_id');
    // }

}
