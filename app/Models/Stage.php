<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Stage extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stg_name',
        'stg_description',
        'status_id',
    ];

    //protected $softCascade = ['userProfiles'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stages';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * period_stages
     *
     * @return void
     */
    /*public function periodStages ()
    {
    	return $this->hasMany(PeriodStages::class);
    }*/

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
