<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Collaborator extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection,Auditable;

    protected $table = 'collaborators';

    /**
     * users
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
