<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class LearningComponent extends Model implements AuditableContract
{
    use HasFactory,UsesTenantConnection,Auditable,SoftDeletes;

    protected $table = 'learning_components';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    // protected $appends = ['total_mesh_workload'];

    protected $fillable = [
        'mesh_id',
        'component_id',
        'lea_workload',
        'status_id',
    ];

    /**
     * Matter Mesh
     *
     * @return void
     */
    public function mesh () {
        return $this->belongsTo(Curriculum::class, 'mesh_id','id');
    }

    /**
     * Component
     *
     * @return void
     */
    public function component () {
        return $this->belongsTo(Component::class, 'component_id','id');
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
