<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Mention extends Model implements AuditableContract
{
    use HasFactory , UsesTenantConnection ,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'mentions';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'ment_name',
        'ment_description',
        'ment_acronym',
        'status_id',
    ];



    /**
     * status
     *
     * @return BelongsTo
     */
    public function status () : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
