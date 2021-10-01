<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CustomAudits extends Tenant implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'audits';

    protected $guarded = [];

    protected $casts = [
        'old_values'   => 'json',
        'new_values'   => 'json',
        /* Note: Please do not add 'auditable_id' in here, as it will break non-integer PK models */
    ];
}
