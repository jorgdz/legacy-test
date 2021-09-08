<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Identification extends Model implements AuditableContract
{
    use Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'ti_name',
    ];

    protected $table = 'type_identifications';

    protected $hidden = ['created_at','updated_at'];

    /**
     * user
     *
     * @return void
     */
    public function user ()
    {
        return $this->belongsTo(User::class, 'type_identification_id');
    }
}
