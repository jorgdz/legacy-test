<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ClassroomEducationLevel extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'classroom_education_levels';

    /**
     * relations
     *
     * @var array
     */
    //protected $relations = ['period_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'pivot'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'classroom_id',
        'period_id',
        'education_level_id',
        'status_id',
    ];

    /**
     * Classroom 
     *
     * @return void
     */
    public function classRoom () {
        return $this->belongsTo(ClassRoom::class, 'classroom_id');
    }

    /**
     * EducationLevel 
     *
     * @return void
     */
    public function educationLevel () {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
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
     * status
     *
     * @return void
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
