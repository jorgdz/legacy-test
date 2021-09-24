<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Ethnic extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'ethnics';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

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
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['persons'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'eth_name',
        'eth_description',
        'status_id',
    ];

    /**
     * persons
     *
     * @return HasMany
     */
    public function persons () : HasMany {
        return $this->hasMany(Person::class);
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
