<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ClassRoom extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'classrooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cl_name',
        'cl_cap_max',
        'cl_acronym',
        'cl_description',
        'campus_id',
        'classroom_type_id',
        'status_id',
    ];

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['campus_id','classroom_type_id','status_id'];

    /**
     * The attributes are hidden
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * campus
     *
     * @return BelongsTo
     */
    public function campus() : BelongsTo
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    /**
     * classroomType
     *
     * @return BelongsTo
     */
    public function classroomType() : BelongsTo
    {
        return $this->belongsTo(ClassroomType::class, 'classroom_type_id');
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
