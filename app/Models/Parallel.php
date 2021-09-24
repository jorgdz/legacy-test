<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Parallel extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parallels';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'par_name',
        'par_description',
        'par_acronym',
        'status_id',
    ];

    /**
     * The attributes are hidden
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
