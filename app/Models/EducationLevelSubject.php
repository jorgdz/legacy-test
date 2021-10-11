<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class EducationLevelSubject extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'education_level_subject';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['group_area_id', 'education_level_id', 'period_id', 'subject_id'];

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
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'group_area_id',
        'education_level_id',
        'period_id',
        'subject_id',
    ];

    /**
     * groupArea
     *
     * @return BelongsTo
     */
    public function groupArea() : BelongsTo
    {
        return $this->belongsTo(GroupArea::class, 'group_area_id');
    }

    /**
     * educationLevel
     *
     * @return BelongsTo
     */
    public function educationLevel() : BelongsTo
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    /**
     * period
     *
     * @return BelongsTo
     */
    public function period() : BelongsTo
    {
        return $this->belongsTo(Period::class, 'period_id');
    }

    /**
     * subject
     *
     * @return BelongsTo
     */
    public function subject() : BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
