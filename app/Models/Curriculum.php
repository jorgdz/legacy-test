<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

//class Mesh extends Model implements AuditableContract
class Curriculum extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'curriculums';

    protected $relations = ['mes_modality_id', 'type_calification_id', 'level_edu_id', 'status_id'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'mes_name',
        'mes_res_cas',
        'mes_res_ocas',
        'mes_cod_career',
        'mes_title',
        'mes_itinerary',
        'mes_number_matter',
        'mes_number_period',
        'mes_quantity_external_matter_homologate',
        'mes_quantity_internal_matter_homologate',
        'mes_creation_date',
        'mes_acronym',
        'anio',
        'mes_description',
        'mes_modality_id',
        'type_calification_id',
        'level_edu_id',
        'status_id'
    ];

    /**
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['matterMesh'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];


     /**
     * studentRecords
     *
     * @return HasMany
     */
    public function studentRecords(): HasMany {
        return $this->hasMany(StudentRecord::class);
    }

    /**
    * educationLevels
    *
    * @return BelongsTo
    */
    public function educationLevel(): BelongsTo {
        return $this->belongsTo(EducationLevel::class, 'level_edu_id');
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
     * SubjectCurriculum
     *
     * @return void
     */
    public function matterMesh(): HasMany {
        return $this->hasMany(SubjectCurriculum::class,'mesh_id');
    }

    /**
     * modality
     *
     * @return BelongsTo
     */
    public function modality(): BelongsTo {
        return $this->belongsTo(Catalog::class, 'mes_modality_id');
    }

    /**
     * typeCalification
     *
     * @return BelongsTo
     */
    public function typeCalification(): BelongsTo {
        return $this->belongsTo(TypeCalification::class, 'type_calification_id');
    }

    /**
     * Learning Components
     *
     * @return void
     */
    public function learningComponent(): HasMany {
        return $this->hasMany(LearningComponent::class,'mesh_id');
    }

    public function getMesNumberMatterAttribute () {
        return (int) ($this->attributes['mes_number_matter']);
    }

    public function getMesNumberPeriodAttribute () {
        return (int) ($this->attributes['mes_number_period']);
    }

    public function getMesQuantityExternalMatterHomologateAttribute () {
        return (int) ($this->attributes['mes_quantity_external_matter_homologate']);
    }

    public function getMesQuantityInternalMatterHomologateAttribute () {
        return (int) ($this->attributes['mes_quantity_internal_matter_homologate']);
    }

    public function getAnioAttribute () {
        return (int) ($this->attributes['anio']);
    }

    public function getMesModalityIdAttribute () {
        return (int) ($this->attributes['mes_modality_id']);
    }

    public function getTypeCalificationIdAttribute () {
        return (int) ($this->attributes['type_calification_id']);
    }

    public function getLevelEduIdAttribute () {
        return (int) ($this->attributes['level_edu_id']);
    }

    public function getStatusIdAttribute () {
        return (int) ($this->attributes['status_id']);
    }
}
