<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class StatusMarital extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    protected $table = 'status_marital';

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['persons'];
    
    protected $fillable = [
        'sta_mar_name',
        'sta_mar_description',
        'status_id',
    ];

    /**
     * persons
     *
     * @return void
     */
    public function persons () {
        return $this->hasMany(Person::class, 'status_marital_id');
    }

    /**
     * status
     *
     * @return void
     */
    public function status () {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
