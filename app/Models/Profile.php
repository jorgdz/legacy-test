<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Profile extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pro_name',
        'status_id',
    ];

    protected $softCascade = ['userProfiles'];

    protected $table = 'profiles';

    protected $dates = ['deleted_at'];

    /**
     * userProfiles
     *
     * @return void
     */
    public function userProfiles ()
    {
    	return $this->hasMany(UserProfile::class);
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
