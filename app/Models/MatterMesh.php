<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class MatterMesh extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    protected $table = 'matter_mesh';

    protected $dates = ['deleted_at'];

    protected $guard_name = 'api';

    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matter_id',
        'mesh_id',
        'calification_type',
        'min_calification',
        'num_fouls',
        'matter_rename',
        'status_id',
    ];

    /**
     * matter
     *
     * @return BelongsTo
     */
    public function matter(): BelongsTo
    {
        return $this->belongsTo(Matter::class, 'matter_id');
    }

    /**
     * mesh
     *
     * @return BelongsTo
     */
    public function mesh(): BelongsTo
    {
        return $this->belongsTo(Mesh::class, 'mesh_id');
    }

    /**
     * status
     *
     * @return void
     */
    public function status ()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

}
