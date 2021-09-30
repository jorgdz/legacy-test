<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Agreement extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'agreements';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['agr_name', 'agr_num_matter_homologate', 'status_id'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

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
