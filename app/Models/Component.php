<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Component extends Model implements AuditableContract
{
    use HasFactory,UsesTenantConnection,Auditable,SoftDeletes,SoftCascadeTrait;

    protected $table = 'components';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['detailMatterMesh','learningComponent'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'com_acronym',
        'com_name',
        'status_id',
    ];

    /* Relationships */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * Detail Matter Mesh
     *
     * @return void
     */
    public function detailMatterMesh () {
        return $this->hasMany(DetailSubjectCurriculum::class,'components_id');
    }

    /**
     * Learning Components 
     *
     * @return void
     */
    public function learningComponent () {
        return $this->hasMany(LearningComponent::class,'component_id');
    }
}
