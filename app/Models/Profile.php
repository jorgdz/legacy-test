<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Profile extends Model
{
    use HasFactory, UsesTenantConnection;

    protected $table = 'profiles';

    /**
     * userProfiles
     *
     * @return void
     */
    public function userProfiles ()
    {
    	return $this->hasMany(UserProfile::class);
    }
}
