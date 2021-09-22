<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Offer extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait,Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'off_name',
        'off_description',
        'status_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offers';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at', 'pivot'];

    protected $softCascade = ['educationLevels', 'typeCriterias', 'typeStudents','educationLevels'];

    /**
     * periods
     *
     * @return BelongsToMany
     */
    public function periods () : BelongsToMany
    {
    	return $this->belongsToMany(Period::class);
    }

     /**
     * simbologies
     *
     * @return BelongsToMany
     */
    public function simbologies (): BelongsToMany
    {
        return $this->belongsToMany(Simbology::class, 'offer_simbology', 'offer_id', 'simbology_id');
    }

    /**
     * typeCriterias
     *
     * @return HasMany
     */
    public function typeCriterias(): HasMany
    {
        return $this->hasMany(TypeCriteria::class);
    }

    /**
     * typeCriterias
     *
     * @return HasMany
     */
    public function educationLevels(): HasMany
    {
        return $this->hasMany(EducationLevel::class);
    }

    /**
     * typeStudents
     *
     * @return HasMany
     */
    public function typeStudents(): HasMany
    {
        return $this->hasMany(TypeStudent::class);
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
