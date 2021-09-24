<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class PeriodStage extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'period_stages';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['stage_id', 'period_id', 'status_id'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['stage_id', 'period_id', 'start_date', 'end_date', 'status_id'];

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
     * period
     *
     * @return BelongsTo
     */
    public function period () : BelongsTo
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    /**
     * stage
     *
     * @return BelongsTo
     */
    public function stage () : BelongsTo
    {
        return $this->belongsTo(Stage::class, 'stage_id');
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
