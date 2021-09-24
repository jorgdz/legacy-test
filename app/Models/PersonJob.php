<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class PersonJob extends Model implements AuditableContract
{
    use Auditable, HasFactory, UsesTenantConnection, SoftCascadeTrait, SoftDeletes;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'person_jobs';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['city_id', 'person_id', 'status_id'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'per_job_organization',
        'per_job_position',
        'per_job_direction',
        'per_job_phone',
        'per_job_start_date',
        'per_job_end_date',
        'per_job_current',
        'per_job_iess_affiliated',
        'city_id',
        'person_id',
        'status_id'
    ];

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
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * city
     *
     * @return BelongsTo
     */
    public function city() : BelongsTo {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * person
     *
     * @return BelongsTo
     */
    public function person() : BelongsTo {
        return $this->belongsTo(Person::class, 'person_id');
    }

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
