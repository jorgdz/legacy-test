<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Company extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    protected $table = 'companies';

    protected $dates = ['deleted_at'];

    protected $softCascade = ['campus'];

    protected $fillable = [
        'co_name'
        ,'co_description'
        ,'co_website'
        ,'co_assigned_site'
        ,'co_facebook'
        ,'co_instagram'
        ,'co_linkedin'
        ,'co_youtube'
        ,'co_info_mail'
        ,'co_matrix'
        ,'co_logo'
        ,'co_color'
        ,'co_pay_notification'
        ,'co_ruc'
        ,'co_business_name'
        ,'co_comercial_name'
        ,'co_legal_identification'
        ,'co_agent_legal'
        ,'co_person_type'
        ,'co_direction'
        ,'co_phone'
        ,'co_email'
        ,'status_id'
    ];

    protected $hidden = ['created_at','updated_at','deleted_at'];
    
    /**
     * campus
     *
     * @return void
     */
    public function campus ()
    {
    	return $this->hasMany(Campus::class);
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
