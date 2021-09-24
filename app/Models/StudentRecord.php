<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class StudentRecord extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'student_records';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['student_id', 'education_level_id', 'pensum_id', 'type_student_id', 'period_id', 'economic_group_id', 'status_id'];

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
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['criteriaStudentRecords']; //'studentRecordsPeriods'

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'education_level_id',
        'pensum_id',
        'type_student_id',
        'period_id',
        'economic_group_id',
        'status_id',
    ];

    /**
     * criteriaStudentRecord
     *
     * @return HasMany
     */
    public function criteriaStudentRecords(): HasMany
    {
        return $this->hasMany(CriteriaStudentRecord::class);
    }


    /**
     * studentRecordPrograms
     *
     * @return HasMany
     */
    public function studentRecordPrograms(): HasMany
    {
        return $this->hasMany(StudentRecordProgram::class);
    }

    /**
     * studentRecordsPeriods
     *
     * @return HasMany
     */
    // public function studentRecordsPeriods() : HasMany
    // {
    //     return $this->hasMany(StudentRecordPeriod::class);
    // }

    /**
     * student
     *
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    /**
     * educationLevel
     *
     * @return BelongsTo
     */
    public function educationLevel(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    /**
     * pensum
     *
     * @return BelongsTo
     */
    public function pensum(): BelongsTo
    {
        return $this->belongsTo(Pensum::class, 'pensum_id');
    }

    /**
     * typeStudent
     *
     * @return BelongsTo
     */
    public function typeStudent(): BelongsTo
    {
        return $this->belongsTo(TypeStudent::class, 'type_student_id');
    }

    /**
     * period
     *
     * @return BelongsTo
     */
    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    /**
     * economicGroup
     *
     * @return BelongsTo
     */
    public function economicGroup(): BelongsTo
    {
        return $this->belongsTo(EconomicGroup::class, 'economic_group_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
