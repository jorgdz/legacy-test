<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Course extends Model implements AuditableContract
{
    use HasFactory,  UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'courses';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'max_capacity',
        'matter_id',
        'parallel_id',
        'classroom_id',
        'modality_id',
        'hourhand_id',
        'collaborator_id',
        'curriculum_id',
        'period_id',
        'status_id',
    ];

    /**
     * Subject 
     *
     * @return void
     */
    public function matter () {
        return $this->belongsTo(Subject::class, 'matter_id');
    }

    /**
     * Parallel
     *
     * @return void
     */
    public function parallel () {
        return $this->belongsTo(Parallel::class, 'parallel_id');
    }

    /**
     * Classroom
     *
     * @return void
     */
    public function classroom () {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }

    /**
     * Modality
     *
     * @return void
     */
    public function modality () {
        return $this->belongsTo(Catalog::class, 'modality_id');
    }

    /**
     * Modality
     *
     * @return void
     */
    public function hourhand () {
        return $this->belongsTo(Hourhand::class, 'hourhand_id');
    }

    /**
     * Collarborato
     *
     * @return void
     */
    public function collaborator () {
        return $this->belongsTo(Collaborator::class, 'collaborator_id');
    }

    /**
     * Period 
     *
     * @return void
     */
    public function period () {
        return $this->belongsTo(Period::class, 'period_id');
    }

    /**
     * Period 
     *
     * @return void
     */
    public function curriculum () {
        return $this->belongsTo(Curriculum::class, 'curriculum_id');
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
     * Course Student  
     *
     * @return void
     */
    public function courseStudent () {
        return $this->hasMany(CourseStudent::class,'course_id');
    }
}
