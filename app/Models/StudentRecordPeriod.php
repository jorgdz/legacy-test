<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class StudentRecordPeriod extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;
    
    protected $table = 'student_recods_period';

    protected $fillable = [
        'student_record_id', 
        'periodo_id', 
        'status_student_id', 
        'status_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    protected $relations = [
        'periodo_id', 
        'status_student_id', 
        'status_id'
    ];

    protected $dates = ['deleted_at'];

    /* Relationships */
    public function status(): BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function student_record(): BelongsTo {
        return $this->belongsTo(StudentRecord::class, 'student_record_id');
    }

    public function period(): BelongsTo {
        return $this->belongsTo(Period::class, 'periodo_id');
    }

    public function student_status(): BelongsTo {
        return $this->belongsTo(StatusStudent::class, 'status_student_id');
    }
}
