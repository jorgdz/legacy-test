<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HourSummary extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hours_summaries';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collaborator_id',
        'hs_classes',
        'hs_classes_examns_preparation',
        'hs_tutoring',
        'hs_bonding',
        'hs_academic_management',
        'hs_research',
        'hs_total',
        'collaborator_hour_id',
        'status_id',
    ];

    /**
     * collaboratorHour
     *
     * @return BelongsTo
     */
    public function collaboratorHour(): BelongsTo
    {
        return $this->belongsTo(CollaboratorHour::class, 'collaborator_hour_id');
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
