<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
/**
 * Campus
 */
class Campus extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait,Auditable;


    /**
     * table
     *
     * @var string
     */
    protected $table = 'campus';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['company_id', 'status_id'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'cam_name',
        'cam_description',
        'cam_direction',
        'cam_initials',
        'status_id',
        'company_id',
    ];

    /* protected $auiditInclude = ['cam_name', 'cam_description', 'cam_direction', 'cam_initials', 'status_id','company_id']; */

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
    protected $softCascade = ['periods'];

    /**
     * periods
     *
     * @return HasMany
     */
    public function periods () : HasMany
    {
        return $this->hasMany(Period::class);
    }

    /**
     * company
     *
     * @return BelongsTo
     */
    public function company () : BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
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

    /**
     * classrooms
     *
     * @return HasMany
     */
    public function classrooms() : HasMany
    {
        return $this->hasMany(ClassRoom::class, 'campus_id');
    }
}
