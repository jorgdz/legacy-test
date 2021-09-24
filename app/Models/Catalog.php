<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Catalog extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'catalogs';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'cat_name',
        'cat_acronym',
        'cat_description',
        'parent_id',
        'status_id',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'parent_id',
    ];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function children() {
        return $this->hasMany(Catalog::class, 'parent_id')->with('status')->with('children')->where(function($query) {
            if (isset(request()->query()['data'])) $query->where('status_id', 1);
        });
    }
}
