<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class CollaboratorSignature extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'collaborator_signatures';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['type_report_id', 'collaborator_id', 'position_id', 'sign_reference', 'status_id'];

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
     * relations
     *
     * @var array
     */
    protected $relations = ['type_report_id', 'collaborator_id', 'position_id', 'status_id'];

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
     * type_report
     *
     * @return BelongsTo
     */
    public function type_report(): BelongsTo
    {
        return $this->belongsTo(TypeReport::class, 'type_report_id');
    }

    /**
     * collaborator
     *
     * @return BelongsTo
     */
    public function collaborator(): BelongsTo
    {
        return $this->belongsTo(Collaborator::class, 'collaborator_id');
    }

    /**
     * position
     *
     * @return BelongsTo
     */
    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}
