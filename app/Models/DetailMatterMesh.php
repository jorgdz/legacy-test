<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class DetailMatterMesh extends Model implements AuditableContract
{
    use HasFactory,UsesTenantConnection,Auditable,SoftDeletes;

    protected $table = 'detail_matter_meshes';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    //protected $appends = ['sum_credits'];
    /**
     * 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matter_mesh_id',
        'components_id',
        'dem_workload',
        'status_id',
    ];

    
    /**
     * Matter Mesh
     *
     * @return void
     */
    public function matter_mesh () {
        return $this->belongsTo(MatterMesh::class, 'matter_mesh_id','id');
    }

    /**
     * Component
     *
     * @return void
     */
    public function component () {
        return $this->belongsTo(Component::class, 'components_id','id');
    }

    /**
     * Status
     *
     * @return void
     */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

}
