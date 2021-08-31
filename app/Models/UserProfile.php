<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class UserProfile extends Model
{
    use HasFactory, HasRoles, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    protected $table = 'user_profiles';
    protected $fillable = ['user_id', 'profile_id', 'status_id'];

    protected $dates = ['deleted_at'];

    protected $guard_name = 'api';

    protected $hidden = ['created_at','updated_at','deleted_at'];
    
    /**
     * user
     *
     * @return void
     */
    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
        
    /**
     * profile
     *
     * @return void
     */
    public function profile ()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
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
