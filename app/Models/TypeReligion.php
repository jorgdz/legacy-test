<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeReligion extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'type_religions';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['persons'];

    protected $fillable = [
        'typ_rel_name',
        'typ_rel_description',
        'status_id',
    ];

    /**
     * persons
     *
     * @return HasMany
     */
    public function persons () : HasMany {
        return $this->hasMany(Person::class, 'type_religion_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status () : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
