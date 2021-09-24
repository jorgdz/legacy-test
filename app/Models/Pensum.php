<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Pensum extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'pensums';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['pen_name', 'pen_description', 'pen_acronym', 'anio', 'status_id'];

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
    protected $softCascade = ['meshs', 'studentRecords'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * meshs
     *
     * @return HasMany
     */
    public function meshs() : HasMany {
        return $this->hasMany(Mesh::class);
    }

    /**
     * studentRecords
     *
     * @return HasMany
     */
    public function studentRecords(): HasMany {
        return $this->hasMany(StudentRecord::class);
    }
}
