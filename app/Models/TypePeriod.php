<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypePeriod extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait,Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tp_name',
        'tp_description',
        'status_id',
        'tp_min_matter_enrollment',
        'tp_max_matter_enrollment',
        'tp_num_fees',
        'tp_fees_enrollment',
        'tp_pay_enrollment'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_periods';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $softCascade = ['periods'];

    /**
     * periods
     *
     * @return HasMany
     */
    public function periods () : HasMany
    {
    	return $this->hasMany(Period::class);
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
