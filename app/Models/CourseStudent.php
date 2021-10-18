<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class CourseStudent extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'course_student';

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * guard_name
     *
     * @var string
     */
    protected $guard_name = 'api';

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'student_record_id',
        'final_note',
        'observation',
        'num_fouls',
        'subject_status_id',
        'subject_id',
        'period_id',
        'approval_status',
        'approval_reason_id',
        'status_id'
    ];

    /**
     * Course   
     *
     * @return void
     */
    public function course () {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Student Record   
     *
     * @return void
     */
    public function studentRecord () {
        return $this->belongsTo(StudentRecord::class, 'student_record_id');
    }

    /**
     * Subject Status     
     *
     * @return void
     */
    public function subjectStatus () {
        return $this->belongsTo(SubjectStatus::class, 'subject_status_id');
    }

    /**
     * Subject     
     *
     * @return void
     */
    public function subject () {
        return $this->belongsTo(Subject::class, 'subject_id');
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
     * Approval Reason     
     *
     * @return void
     */
    public function approvalReason () {
        return $this->belongsTo(Catalog::class, 'approval_reason_id');
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
