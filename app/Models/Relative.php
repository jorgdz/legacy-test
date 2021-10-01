<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Relative extends Model implements AuditableContract
{
    use HasFactory,Auditable,SoftDeletes;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'relatives';

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['person_id_relative'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id_relative',
        'person_id',
        'type_kinship_id',
        'rel_description',
        'status_id',
    ];


    /**
     * Type Kinship
     *
     * @return BelongsTo
     */
    public function typeKinship () : BelongsTo {
        return $this->belongsTo(Catalog::class, 'type_kinship_id','id');
    }

    /**
     * personRelative
     *
     * @return BelongsTo
     */
    public function personRelative () : BelongsTo
    {
        return $this->belongsTo(Person::class,'person_id_relative');
    }

    /**
     * personStudent
     *
     * @return BelongsTo
     */
    public function personStudent () : BelongsTo
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

}
