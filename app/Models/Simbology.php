<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Simbology extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'simbologies';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'sim_color',
        'sim_description',
        'status_id'
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'pivot'
    ];

    /**
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['matterMesh'];

    public function status() : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * offers
     *
     * @return BelongsToMany
     */
    public function offers() : BelongsToMany
    {
        return $this->belongsToMany(Offer::class);
    }

    /**
     * matterMesh
     *
     * @return HasMany
     */
    public function matterMesh() : HasMany
    {
        return $this->hasMany(MatterMesh::class);
    }
}
