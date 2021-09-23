<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Matter extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection,Auditable;

    protected $table = 'matters';

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
    protected $hidden = [];
    protected $dates = ['deleted_at'];


    /* Relationship */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function typeMatter() {
        return $this->belongsTo(TypeMatter::class, 'type_matter_id');
    }

    public function typeCalification() {
        return $this->belongsTo(TypeCalification::class, 'type_calification_id');
    }

    /**
     * matterMesh
     *
     * @return void
     */
    public function matterMesh()
    {
        return $this->hasMany(MatterMesh::class, 'matter_id');
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

    public function educationLevel() {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }
}
