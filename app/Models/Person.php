<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Person extends Model implements AuditableContract
{
    use Auditable, HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pers_identification',
        'pers_firstname',
        'pers_secondname',
        'pers_first_lastname',
        'pers_second_lastname',
        'pers_gender',
        'pers_date_birth',
        'pers_direction',
        'pers_phone_home',
        'pers_cell',
        'pers_num_child',
        'pers_profession',
        'type_identification_id',
        'type_religion_id',
        'status_marital_id',
        'city_id',
        'current_city_id',
        'sector_id',
        'ethnic_id'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    /* TODO: Verificar tablas intermedias */
    protected $softCascade = ['user','emergencyContact', 'personJob'];

    /**
     * typeIdentifications
     *
     * @return void
     */
    public function identification () {
        return $this->belongsTo(TypeIdentification::class, 'type_identification_id', 'id');
    }

    /**
     * person is a user
     *
     * @return void
     */
    public function user () {
        return $this->hasMany(User::class, 'person_id');
    }

    /**
     * person is a user
     *
     */
    public function lenguajes () {
        return $this->belongsToMany(TypeLanguage::class,'language_persons','person_id','language_id');
    }
    
    /**
     * religion
     *
     * @return void
     */
    public function religion () {
        return $this->belongsTo(TypeReligion::class, 'type_religion_id');
    }

    /**
     * statusMarital
     *
     * @return void
     */
    public function statusMarital () {
        return $this->belongsTo(StatusMarital::class, 'status_marital_id');
    }

    /**
     * origin city
     *
     * @return void
     */
    public function city () {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * currentCity
     *
     * @return void
     */
    public function currentCity () {
        return $this->belongsTo(City::class, 'current_city_id');
    }

    /**
     * sector
     *
     * @return void
     */
    public function sector () {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    /**
     * ethnic
     *
     * @return void
     */
    public function ethnic () {
        return $this->belongsTo(Ethnic::class, 'ethnic_id');
    }

    /**
     * Emergency Contact
     *
     * @return void
     */
    public function emergencyContact () {
        return $this->hasMany(EmergencyContact::class, 'person_id');
    }

    /**
     * personJob
     *
     * @return void
     */
    public function personJob ()
    {
        return $this->hasMany(PersonJob::class);
    }
}
