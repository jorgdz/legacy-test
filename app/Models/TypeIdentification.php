<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeIdentification extends Model implements AuditableContract
{
    use Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ti_name',
    ];

    protected $table = 'type_identifications';

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * person
     *
     * @return HasMany
     */
    public function persons () : HasMany
    {
        return $this->hasMany(Person::class, 'type_identification_id');
    }
}
