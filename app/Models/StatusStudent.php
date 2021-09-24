<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class StatusStudent extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    protected $table = 'status_students';

    protected $fillable = [
        'sts_name', 
        'sts_description', 
        'sts_let_pay', 
        'status_id'
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at'
    ];

    /* Relationships */
}
