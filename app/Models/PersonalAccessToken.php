<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use HasFactory;

    public static function findToken($token)
    {
        if (strpos($token, '|') === false) {
            return static::where('token', hash('sha256', $token))->first();
        }

        [$id, $token] = explode('|', $token, 2);

        $key = request()->getHost(). "_find_token_{$id}";
        $instance = Cache::remember($key, now()->addMinutes(150), function () use ($id) {
            return static::find($id);
        });

        if ($instance) {
            return hash_equals($instance->token, hash('sha256', $token)) ? $instance : null;
        }
    }
}
