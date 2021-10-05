<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeReport extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'type_reports';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['name', 'acronym', 'description', 'rrhh', 'status_id'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['collaboratorSignatures', 'otherSignatures'];

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

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
     * collaboratorSignatures
     *
     * @return HasMany
     */
    public function collaboratorSignatures(): HasMany
    {
        return $this->hasMany(CollaboratorSignature::class, 'type_report_id');
    }

    /**
     * otherSignatures
     *
     * @return HasMany
     */
    public function otherSignatures(): HasMany
    {
        return $this->hasMany(OtherSignature::class, 'type_report_id');
    }
}
