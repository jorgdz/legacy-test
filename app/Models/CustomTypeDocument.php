<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CustomTypeDocument extends Tenant implements AuditableContract
{
    use HasFactory, Auditable;

    protected $table = 'type_documents';

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];
}
