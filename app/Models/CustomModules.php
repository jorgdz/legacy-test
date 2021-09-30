<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CustomModules extends Tenant implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    protected $table = 'modules';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'group',
        'status_id',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(CustomStatus::class, 'status_id');
    }
}
