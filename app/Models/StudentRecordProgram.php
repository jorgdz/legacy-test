<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class StudentRecordProgram extends Model  implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_record_programs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_record_id',
        'type_student_program_id',
        'status_id'
    ];


    protected $relations = [
        'student_record_id',
        'type_student_program_id',
        'status_id'
    ];



    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];



    /**
     * studentRecord
     *
     * @return void
     */
    public function studentRecord()
    {
        return $this->belongsTo(StudentRecord::class, 'student_record_id');
    }


    /**
     * type_student_program
     *
     * @return void
     */
    public function typeStudentProgram()
    {
        return $this->belongsTo(TypeStudentProgram::class, 'type_student_program_id');
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
