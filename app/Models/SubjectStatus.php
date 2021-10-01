<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

//class MatterStatus extends Model implements AuditableContract
class SubjectStatus extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'subject_status';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['type_matter_id','status_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'type_matter_id', 'status_id'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $softCascade = [];

    public function typeMatter() : BelongsTo
    {
        return $this->belongsTo(TypeSubject::class, 'type_matter_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /* TODO: Add softCascade */
    /* public function course_student() {
        return $this->hasMany(CourseStudent::class);
    } */
}
