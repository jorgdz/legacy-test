<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class PersonJob extends Model implements AuditableContract
{
    use Auditable, HasFactory, UsesTenantConnection, SoftCascadeTrait, SoftDeletes;

    protected $table = 'person_jobs';
        
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
        'city_id', 
        'person_id',
        'status_id'
    ];

    protected $dates = ['deleted_at'];

    protected $guard_name = 'api';

    protected $hidden = ['created_at','updated_at','deleted_at'];
    
    /**
     * city
     *
     * @return void
     */
    public function city  () {
        return $this->belongsTo(City::class);
    }

    /**
     * persons
     *
     * @return void
     */
    public function person  () {
        return $this->belongsTo(Person::class, 'person_id');
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
