<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Collaborator extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'collaborators';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'coll_email',
        'coll_type',
        'coll_activity',
        'coll_journey_description',
        'coll_dependency',
        'coll_journey_hours',
        'position_company_id',
        'coll_entering_date',
        'coll_leaving_date',
        'coll_membership_num',
        'coll_contract_num',
        'coll_has_nomination',
        'coll_nomination_entering_date',
        'coll_nomination_leaving_date',
        'education_level_principal_id',
        'status_id',
        'user_id',
    ];

    /**
     * users
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * position
     *
     * @return BelongsTo
     */
    public function position() : BelongsTo
    {
        return $this->belongsTo(Position::class, 'position_company_id');
    }

    /**
     * position
     *
     * @return BelongsTo
     */
    public function EducationLevelPrincipal() : BelongsTo
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_principal_id','id');
    }

    /**
     * campus
     *
     * @return HasOne
     */
    public function educationLevels() : HasMany
    {
        return $this->hasMany(CollaboratorEducationLevel::class);
    }
    /**
     * campus
     *
     * @return HasOne
     */
    public function campus() : HasMany
    {
        return $this->hasMany(CollaboratorCampus::class);
    }


    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
