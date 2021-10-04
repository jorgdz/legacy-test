<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeDisability extends Model implements AuditableContract
{
    use HasFactory,Auditable;

    /**
    * table
    *
    * @var string
    */
   protected $table = 'type_disabilities';

   protected $fillable = [
       'typ_dis_name',
       'typ_dis_description',
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
     * persons
     *
     * @return BelongsToMany
     */
    public function persons (): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'disability_person','person_id','type_disability_id');
    }
}
