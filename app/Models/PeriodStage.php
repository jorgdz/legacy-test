<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class PeriodStage extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    protected $table = 'period_stages';
    protected $fillable = ['stage_id', 'period_id', 'start_date', 'end_date', 'status_id'];

    protected $dates = ['deleted_at'];

    protected $guard_name = 'api';

    protected $hidden = ['created_at','updated_at','deleted_at'];
        
    /**
     * period
     *
     * @return void
     */
    public function periods ()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }
            
    /**
     * stage
     *
     * @return void
     */
    public function stages ()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
