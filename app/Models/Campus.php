<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

/**
 * Campus
 */
class Campus extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    protected $table = 'campus';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'cam_name',
        'cam_description',
        'cam_direction',
        'cam_initials',
        'status_id',
        'company_id',
    ];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * company
     *
     * @return void
     */
    public function company ()
    {
        return $this->belongsTo(Company::class, 'company_id');
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
