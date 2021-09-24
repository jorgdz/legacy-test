<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'hour_description',
        'hour_start_time',
        'hour_end_time',
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
     * @return void
     */
    public function periods ()
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
