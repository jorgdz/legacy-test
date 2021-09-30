<?php

namespace App\Models;

use App\Http\Requests\CalificationModelFormRequest;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


class MatterMesh extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'matter_mesh';

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

    protected $appends = ['total_hours_workload'];

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
    public function matter(): BelongsTo
    {
        return $this->belongsTo(Matter::class, 'matter_id');
    }

    /**
     * mesh
     *
     * @return BelongsTo
     */
    public function mesh(): BelongsTo
    {
        return $this->belongsTo(Mesh::class, 'mesh_id');
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
    public function matterMeshDependencies(): BelongsToMany
    {
        return $this->belongsToMany(MatterMesh::class, 'mat_mesh_dependencies', 'parent_matter_mesh_id', 'child_matter_mesh_id');
    }

    /**
     * Detail Matter Mesh
     *
     * @return void
     */
    public function detailMatterMesh()
    {
        return $this->hasMany(DetailMatterMesh::class, 'matter_mesh_id');
    }

    /**
     * Total of hours grouped by Matter mesh
     *
     * @return void
     */
    public function getTotalHoursWorkloadAttribute()
    {
        return DetailMatterMesh::where('matter_mesh_id', '=', $this->id)->groupBy('matter_mesh_id')->sum('dem_workload');
    }

    /**
     * matterMeshPrerequisites
     *
     * @return BelongsToMany
     */
    public function matterMeshPrerequisites(): BelongsToMany
    {
        return $this->belongsToMany(MatterMesh::class, 'mat_mesh_dependencies', 'child_matter_mesh_id', 'parent_matter_mesh_id');
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
}
