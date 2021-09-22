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
        'per_fees',
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

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at', 'pivot'];

    protected $softCascade = ['periodStages', 'studentRecords']; //courses

    /**
     * hourhands
     *
     * @return BelongsToMany
     */
    public function hourhands (): BelongsToMany
    {
        return $this->belongsToMany(Hourhand::class, 'hourhand_period','period_id', 'hourhand_id');
    }

    /**
     * offers
     *
     * @return BelongsToMany
     */
    public function offers () : BelongsToMany
    {
        return $this->belongsToMany(Offer::class, 'offer_period', 'period_id', 'offer_id');
    }

    /**
     * periodStages
     *
     * @return void
     */
    public function periodStages ()
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
    public function studentRecords (): HasMany
    {
        return $this->hasMany(StudentRecord::class);
    }

    /**
     * campus
     *
     * @return void
     */
    public function campus ()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    /**
     * typePeriods
     *
     * @return void
     */
    public function typePeriod ()
    {
        return $this->belongsTo(TypePeriod::class, 'type_period_id');
    }

    /**
     * status
     *
     * @return void
     */
    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
