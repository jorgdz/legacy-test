<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
// use OwenIt\Auditing\Auditable;
// use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class EmergencyContact extends Model// implements AuditableContract
{
    //use HasFactory, Auditable;
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    protected $table = 'emergency_contacts';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
        'em_ct_name',
        'em_ct_first_phone',
        'em_ct_second_phone',
        'type_kinship_id',
        'status_id',
        'person_id'
    ];

    

    /**
     * emergency contact has a person
     *
     * @return void
     */
    public function person () {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    //FALTA KINSHIP
}
