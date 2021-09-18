<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Mention extends Model implements AuditableContract
{
    use HasFactory , UsesTenantConnection ,Auditable;

    protected $table = 'mentions';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
        'ment_name',
        'ment_description',
        'ment_acronym',
        'status_id',
    ];



    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
