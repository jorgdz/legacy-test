<?php

namespace App\Models;

use App\Http\Requests\CalificationModelFormRequest;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use PhpParser\Node\Expr\Cast\Double;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

//class MatterMesh extends Model implements AuditableContract
class SubjectCurriculum extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'subject_curriculum';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'matter_id',
        'mesh_id',
        'simbology_id',
        'calification_models_id',
        'status_id'
    ];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * guard_name
     *
     * @var string
     */
    protected $guard_name = 'api';

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'pivot'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matter_id',
        'mesh_id',
        'simbology_id',
        'can_homologate',
        'is_prerequisite',
        'min_note',
        'min_calification',
        'max_calification',
        'num_fouls',
        'matter_rename',
        'group',
        'order',
        'calification_models_id',
        'status_id',
    ];

    /**
     * matter
     *
     * @return BelongsTo
     */
    public function matter(): BelongsTo {
        return $this->belongsTo(Subject::class, 'matter_id');
    }

    /**
     * mesh
     *
     * @return BelongsTo
     */
    public function mesh(): BelongsTo {
        return $this->belongsTo(Curriculum::class, 'mesh_id');
    }

    /**
     * simbology
     *
     * @return BelongsTo
     */
    public function simbology(): BelongsTo
    {
        return $this->belongsTo(Simbology::class, 'simbology_id');
    }

    /**
     * status
     *
     * @return void
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * matterMeshDependencies
     *
     * @return BelongsToMany
     */
    public function matterMeshDependencies(): BelongsToMany {
        return $this->belongsToMany(SubjectCurriculum::class, 'subject_curriculum_dependencies','parent_matter_mesh_id', 'child_matter_mesh_id');
    }

    /**
     * Detail Matter Mesh
     *
     * @return HasMany
     */
    public function detailMatterMesh () : HasMany {
        return $this->hasMany(DetailSubjectCurriculum::class,'matter_mesh_id');
    }

    /**
     * matterMeshPrerequisites
     *
     * @return BelongsToMany
     */
    public function matterMeshPrerequisites(): BelongsToMany {
        return $this->belongsToMany(SubjectCurriculum::class, 'subject_curriculum_dependencies','child_matter_mesh_id','parent_matter_mesh_id');

    }

    /**
     * calificationModel
     *
     * @return BelongsTo
     */
    public function calificationModel(): BelongsTo
    {
        return $this->belongsTo(CalificationModel::class, 'calification_models_id');
    }

    public function getMinNoteAttribute () {
        return (float) ($this->attributes['min_note']);
    }

    public function getMinCalificationAttribute () {
        return (float) ($this->attributes['min_calification']);
    }

    public function getMaxCalificationAttribute () {
        return (float) ($this->attributes['max_calification']);
    }

    public function getNumFoulsAttribute () {
        return (int) ($this->attributes['num_fouls']);
    }

    public function getGroupAttribute () {
        return (int) ($this->attributes['group']);
    }

    public function getOrderAttribute () {
        return (int) ($this->attributes['order']);
    }

    public function getCalificationModelsIdAttribute () {
        return (int) ($this->attributes['calification_models_id']);
    }

    public function getStatusIdAttribute () {
        return (int) ($this->attributes['status_id']);
    }
}
