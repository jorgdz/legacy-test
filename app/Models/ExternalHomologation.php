<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class ExternalHomologation extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    protected $table = 'external_homologations';

    protected $fillable = [
        'inst_subject_id',
        'subject_id',
        'relation_pct',
        'comments',
        'status_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    protected $relations = [
        'inst_subject_id',
        'subject_id',
        'status_id'
    ];

    /**
     * subject
     *
     * @return BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * institutionSubject
     *
     * @return BelongsTo
     */
    public function institutionSubject(): BelongsTo
    {
        return $this->belongsTo(InstitutionSubject::class, 'inst_subject_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
