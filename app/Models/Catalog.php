<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Catalog extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, Auditable;

    protected $table = 'catalogs';

    protected $fillable = [
        'cat_name',
        'cat_acronym',
        'cat_description',
        'parent_id',
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
        'deleted_at',
        'parent_id',
    ];

    public function children() {
        return $this->hasMany(Catalog::class, 'parent_id')->with('children');
    }
}
