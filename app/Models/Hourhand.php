<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Hourhand extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hourhands';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hour_monday',
        'hour_tuesday',
        'hour_wednesday',
        'hour_thursday',
        'hour_friday',
        'hour_saturday',
        'hour_sunday',
        'hour_start_time_monday',
        'hour_end_time_monday',
        'hour_start_time_tuesday',
        'hour_end_time_tuesday',
        'hour_start_time_wednesday',
        'hour_end_time_wednesday',
        'hour_start_time_thursday',
        'hour_end_time_thursday',
        'hour_start_time_friday',
        'hour_end_time_friday',
        'hour_start_time_saturday',
        'hour_end_time_saturday',
        'hour_start_time_sunday',
        'hour_end_time_sunday',
        'hour_description',
        'status_id',
    ];

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
    protected $hidden = ['created_at','updated_at','deleted_at','pivot'];

    //protected $softCascade = ['courses'];

    /**
     * periods
     *
     * @return BelongsToMany
     */
    public function periods () : BelongsToMany
    {
        return $this->belongsToMany(Period::class);
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
     * status
     *
     * @return BelongsTo
     */
    public function status () : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
