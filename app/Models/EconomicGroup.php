<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class EconomicGroup extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'economic_groups';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $softCascade = ['studentRecords'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eco_gro_name',
        'eco_gro_description',
        'status_id',
    ];


    /**
     * studentRecords
     *
     * @return HasMany
     */
    public function studentRecords (): HasMany
    {
        return $this->hasMany(StudentRecord::class);
    }

    /**
     * status
     *
     * @return void
     */
    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
