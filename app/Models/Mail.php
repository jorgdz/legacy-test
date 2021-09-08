<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Mail extends Tenant implements AuditableContract
{
    use HasFactory,Auditable;

    protected $table = 'mails';

    protected $fillable = ['transport', 'host', 'port', 'encryption', 'username', 'password'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * tenant
     *
     * @return void
     */
    public function tenant ()
    {
        return $this->belongsTo(CustomTenant::class, 'tenant_id');
    }
}
