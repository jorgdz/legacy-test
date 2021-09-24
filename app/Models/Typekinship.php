<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeKinship extends Model
{
    use HasFactory;

     /**
     * table
     *
     * @var string
     */
    protected $table = 'type_kinship';

    protected $fillable = [
        'typ_kin_name',
        'typ_kin_description',
        'status_id',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * Relative
     *
     * @return HasMany
     */
    public function relatives () : HasMany {
        return $this->hasMany(Relative::class,'type_kinship_id');
    }

    /**
     * emergencyContacts
     *
     * @return HasMany
     */
    public function emergencyContacts() : HasMany
    {
        return $this->hasMany(EmergencyContact::class, 'type_kinship_id');
    }
}
