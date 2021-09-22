<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
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
        'tp_fees'
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
     * userProfiles
     *
     * @return void
     */
    public function periods ()
    {
    	return $this->hasMany(Period::class);
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
