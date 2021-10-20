<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Period extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'per_name',
        'per_reference',
        'per_current_year',
        'per_due_year',
        'per_min_matter_enrollment',
        'per_max_matter_enrollment',
        'per_num_fees',
        'per_fees_enrollment',
        'per_pay_enrollment',
        'campus_id',
        'type_period_id',
        'status_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'periods';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['campus_id', 'type_period_id', 'status_id', 'classroomEducationLevel'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'pivot'];

    /**
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['periodStages']; //, 'studentRecords' , courses

    /**
     * hourhands
     *
     * @return BelongsToMany
     */
    public function hourhands(): BelongsToMany
    {
        return $this->belongsToMany(Hourhand::class, 'hourhand_period', 'period_id', 'hourhand_id');
    }

    /**
     * offers
     *
     * @return BelongsToMany
     */
    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class, 'offer_period', 'period_id', 'offer_id');
    }

    /**
     * periodStages
     *
     * @return HasMany
     */
    public function periodStages(): HasMany
    {
        return $this->hasMany(PeriodStage::class);
    }

    /**
     * courses
     *
     * @return HasMany
     */
    // public function courses (): HasMany
    // {
    //     return $this->hasMany(Course::class);
    // }

    /**
     * studentRecords
     *
     * @return HasMany
     */
    /* public function studentRecords (): HasMany
    {
        return $this->hasMany(StudentRecord::class);
    } */

    /**
     * campus
     *
     * @return void
     */
    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    /**
     * typePeriods
     *
     * @return void
     */
    public function typePeriod()
    {
        return $this->belongsTo(TypePeriod::class, 'type_period_id');
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
     * Classroom Education Level
     *
     * @return void
     */
    public function classroomEducationLevel(): HasMany
    {
        return $this->hasMany(ClassroomEducationLevel::class, 'period_id');
    }

    /**
     * Course
     *
     * @return void
     */
    public function course(): HasMany
    {
        return $this->hasMany(Course::class, 'period_id');
    }

    /**
     * Course Student  
     *
     * @return void
     */
    public function courseStudent()
    {
        return $this->hasMany(CourseStudent::class, 'period_id');
    }

    /**
     * hourSummarys
     *
     * @return BelongsTo
     */
    public function hourSummarys(): HasMany
    {
        return $this->hasMany(HourSummary::class);
    }
}
