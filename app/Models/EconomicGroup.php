<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * softCascade
     *
     * @var array
     */
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
     * @return BelongsTo
     */
    public function status () : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
