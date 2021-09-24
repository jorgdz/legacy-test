<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class ClassroomType extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'classroom_types';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'clt_name',
        'clt_description',
        'status_id',
    ];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo
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
        return $this->hasMany(ClassRoom::class, 'classroom_type_id');
    }


}
