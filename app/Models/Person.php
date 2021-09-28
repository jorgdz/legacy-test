<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Person extends Model implements AuditableContract
{
    use Auditable, HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'persons';

    /**
     * relations
     *
     * @var array
     */
    /*
    protected $relations = [
        'type_identification_id',
        'city_id',
        'sector_id',
        'ethnic_id',
        'vivienda_id',
        'type_religion_id',
        'status_marital_id'
    ];
    */

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
        'pers_num_bedrooms',
        'pers_study_reason',
        'pers_num_taxpayers_household',
        'pers_has_vehicle',
        'vivienda_id',
        'type_identification_id',
        'type_religion_id',
        'status_marital_id',
        'city_id',
        'current_city_id',
        'sector_id',
        'ethnic_id'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at', 'pivot'];

    protected $dates = ['deleted_at'];

    /* TODO: Verificar tablas intermedias */
    protected $softCascade = ['user','emergencyContact', 'personJob','personStudents'];

    /**
     * typeIdentifications
     *
     * @return BelongsTo
     */
    public function identification () : BelongsTo {
        return $this->belongsTo(Catalog::class, 'type_identification_id', 'id');
    }

    /**
     * person is a user
     *
     * @return void
     */
    public function user () {
        return $this->hasOne(User::class, 'person_id');
    }

    /**
     * languages
     * @return BelongsToMany
     *
     */
    public function languages () : BelongsToMany {
        return $this->belongsToMany(Catalog::class,'catalog_person','person_id','catalog_id');
    }

    /**
     * living place
     *
     * @return void
     */
    public function livingPlace () {
        return $this->belongsTo(Catalog::class, 'vivienda_id');
    }

    /**
     * religion
     *
     * @return BelongsTo
     */
    public function religion () : BelongsTo {
        return $this->belongsTo(Catalog::class, 'type_religion_id');
    }

    /**
     * statusMarital
     *
     * @return BelongsTo
     */
    public function statusMarital () : BelongsTo {
        return $this->belongsTo(Catalog::class, 'status_marital_id');
    }

    /**
     * origin city
     *
     * @return BelongsTo
     */
    public function city () : BelongsTo {
        return $this->belongsTo(Catalog::class, 'city_id');
    }

    /**
     * currentCity
     *
     * @return BelongsTo
     */
    public function currentCity () : BelongsTo {
        return $this->belongsTo(Catalog::class, 'current_city_id');
    }

    /**
     * sector
     *
     * @return BelongsTo
     */
    public function sector () : BelongsTo {
        return $this->belongsTo(Catalog::class, 'sector_id');
    }

    /**
     * ethnic
     *
     * @return BelongsTo
     */
    public function ethnic () : BelongsTo {
        return $this->belongsTo(Catalog::class, 'ethnic_id');
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
     * @return HasMany
     */
    public function personJob () : HasMany
    {
        return $this->hasMany(PersonJob::class);
    }

    /**
     * personRelative
     *
     * @return HasMany
     */
    public function personRelatives () : HasMany {
        return $this->hasMany(Relative::class,'person_id_relative');

    }

    /**
     * person_student
     *
     * @return void
     */
    public function personStudents () {
        return $this->hasMany(Relative::class,'person_id_student');

    }
}
