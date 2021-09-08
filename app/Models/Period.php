<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Period extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait,Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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

    protected $hidden = ['created_at','updated_at','deleted_at'];

     protected $softCascade = ['offerPeriod', 'periodStages'];//, 'courses', 'hourhandPeriod', 'studentRecords'];

    /**
     * hourhandPeriod
     *
     * @return void
     */
    /*public function hourhandPeriod ()
    {
        return $this->hasMany(HourhandPeriod::class);
    }*/
 
    /**
     * offerPeriod
     *
     * @return void
     */
    public function offerPeriod ()
    {
        return $this->hasMany(OfferPeriod::class);
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
     * @return void
     */
    /*public function courses ()
    {
        return $this->hasMany(Course::class);
    }*/

    /**
     * studentRecords
     *
     * @return void
     */
    /*public function studentRecords ()
    {
        return $this->hasMany(StudentRecord::class);
    }*/

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
    public function typePeriods ()
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
