<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class MatterMesh extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes,Auditable;

    protected $table = 'matter_mesh';

    protected $dates = ['deleted_at'];

    protected $guard_name = 'api';

    protected $hidden = ['created_at','updated_at','deleted_at','pivot'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matter_id',
        'mesh_id',
        'calification_type',
        'min_calification',
        'clasification_matter',
        'num_fouls',
        'matter_rename',
        'group',
        'order',
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
     * status
     *
     * @return void
     */
    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * matterMeshDependencies
     *
     * @return BelongsToMany
     */
    public function matterMeshDependencies (): BelongsToMany
    {
        return $this->belongsToMany(MatterMesh::class, 'mat_mesh_dependencies','parent_matter_mesh_id', 'child_matter_mesh_id');
    }

}
