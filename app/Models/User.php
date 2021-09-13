<?php

namespace App\Models;

use App\Notifications\MailResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements AuditableContract
{
    use Auditable, HasFactory, HasRoles, HasApiTokens, Notifiable, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'us_username',
        'email',
        'password',
        'person_id',
        'status_id',
    ];

    protected $auiditInclude = ['us_username', 'email'];

    protected $guard_name = 'api';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['userProfiles', 'person', 'collaborators'];

    /**
     * sendPasswordResetNotification
     *
     * @param  mixed $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $url = app('currentTenant')->domain_client.'/'.'restablecer-clave'.'/'.$token;
        $this->notify(new MailResetPasswordNotification($url));
    }

    /**
     * userProfiles
     *
     * @return void
     */
    public function userProfiles() {
        return $this->hasMany(UserProfile::class);
    }

    /**
     * status
     *
     * @return void
     */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * collaborators
     *
     * @return void
     */
    public function collaborators () {
        return $this->belongsTo(Collaborator::class, 'id', 'user_id');
    }
        
    /**
     * user is a person
     *
     * @return void
     */
    public function person () {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
