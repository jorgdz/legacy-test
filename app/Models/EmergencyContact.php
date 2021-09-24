<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class EmergencyContact extends Model// implements AuditableContract
{
    //use HasFactory, Auditable;
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'emergency_contacts';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['type_kinship_id', 'person_id', 'status_id'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * fillable
     *
     * @var array
     */
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
     * @return BelongsTo
     */
    public function person () : BelongsTo {
        return $this->belongsTo(Person::class, 'person_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status () : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * typeKinship
     *
     * @return BelongsTo
     */
    public function typeKinship() : BelongsTo
    {
        return $this->belongsTo(Typekinship::class, 'type_kinship_id');
    }
}
