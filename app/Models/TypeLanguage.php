<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeLanguage extends Model implements AuditableContract
{
    use HasFactory,Auditable;

     /**
     * table
     *
     * @var string
     */
    protected $table = 'type_languages';

    protected $fillable = [
        'typ_lan_name',
        'typ_lan_description',
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
     * a person has many languages
     *
     * @return BelongsToMany
     */
    public function persons () : BelongsToMany {
        return $this->belongsToMany(Person::class,'language_persons','person_id','language_id');
    }
}
