<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class GroupAreaSubject extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'group_area_subjects';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['group_nivelation_id', 'subject_id', 'status_id'];

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
        'group_nivelation_id',
        'subject_id',
        'status_id'
    ];


    /**
     * groupArea
     *
     * @return BelongsTo
     */
    public function groupArea() : BelongsTo
    {
        return $this->belongsTo(AreaGroup::class, 'group_nivelation_id');
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

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
