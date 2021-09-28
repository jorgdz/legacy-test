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

class Mesh extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'meshs';

    protected $relations = [ 'level_edu_id', 'status_id'];

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
        'mes_description',
        'mes_acronym',
        'anio',
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


    // /**
    //  * pensum
    //  *
    //  * @return BelongsTo
    //  */
    // public function pensum() : BelongsTo
    // {
    //     return $this->belongsTo(Pensum::class, 'pensum_id');
    // }


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
    public function educationLevel() : BelongsTo
    {
        return $this->belongsTo(EducationLevel::class, 'level_edu_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo
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
        return $this->hasMany(MatterMesh::class);
    }

    /**
     * Learning Components 
     *
     * @return void
     */
    public function learningComponent () 
    {
        return $this->hasMany(LearningComponent::class,'mesh_id');
    }
}
