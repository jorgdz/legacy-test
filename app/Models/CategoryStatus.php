<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CategoryStatus extends Model implements AuditableContract
{
    use Auditable, HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'category_status';

    /**
     * primaryKey
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_name',
        'cat_description',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * status
     *
     * @return HasMany
     */
    public function status() : HasMany {
        return $this->hasMany(Status::class, 'category_status_id');
    }
}
