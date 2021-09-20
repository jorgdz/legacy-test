<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Mesh extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    protected $table = 'meshs';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'mes_name',
        'mes_description',
        'mes_acronym',
        'pensum_id',
        'level_edu_id',
        'status_id'
    ];

    protected $softCascade = ['matterMesh'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];


    /**
     * pensum
     *
     * @return void
     */
    public function pensum()
    {
        return $this->belongsTo(Pensum::class, 'pensum_id');
    }

    /**
    * educationLevels
    *
    * @return void
    */
    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'level_edu_id');
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
     * matterMesh
     *
     * @return void
     */
    public function matterMesh()
    {
        return $this->hasMany(MatterMesh::class, 'mesh_id');
    }
}
