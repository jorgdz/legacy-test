<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Relative extends Model implements AuditableContract
{
    use HasFactory,Auditable,SoftDeletes;

    protected $table = 'relatives';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $relations = ['person_id_relative'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id_relative',
        'person_id_student',
        'type_kinship_id',
        'rel_description',
        'status_id',
    ];


    /**
     * Type Kinship
     *
     * @return void
     */
    public function type_kinship () {
        return $this->belongsTo(Typekinship::class, 'type_kinship_id','id');
    }

    /**
     * Person Relative
     *
     * @return void
     */
    public function person_relative ()
    {
        return $this->belongsTo(Person::class,'person_id_relative');
    }

    /**
     * Person
     *
     * @return void
     */
    public function person_student ()
    {
        return $this->belongsTo(Person::class, 'person_id_student');
    }

    /* Relationships */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

}
