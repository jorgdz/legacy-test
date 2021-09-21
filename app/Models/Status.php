<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Status extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, Auditable;

    protected $table = 'status';

    /**
     * primaryKey
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['category_status_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'st_name'
    ];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function categoryStatus() {
        return $this->belongsTo(CategoryStatus::class, 'category_status_id');
    }
}
