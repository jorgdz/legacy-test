<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Institute extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'institutes';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['province_id', 'type_institute_id', 'status_id', 'economic_group_id'];

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
        'inst_name',
        'province_id',
        'status_id',
        'type_institute_id',
        'economic_group_id',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * typeInstitute
     *
     * @return BelongsTo
     */
    public function typeInstitute(): BelongsTo
    {
        return $this->belongsTo(InstituteType::class, 'type_institute_id');
    }

    /**
     * province
     *
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'province_id');
    }

    /**
     * economicGroup
     *
     * @return BelongsTo
     */
    public function economicGroup(): BelongsTo
    {
        return $this->belongsTo(EconomicGroup::class, 'economic_group_id');
    }
}
