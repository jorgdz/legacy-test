<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Stage extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait,Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stg_name',
        'stg_description',
        'stg_acronym',
        'status_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stages';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $softCascade = ['periodStages'];

    /**
     * period_stages
     *
     * @return void
     */
    
    public function periodStages ()
    {
    	return $this->hasMany(PeriodStage::class, 'stage_id');
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
