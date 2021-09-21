<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function status() {
        return $this->hasMany(Status::class, 'category_status_id');
    }
}
