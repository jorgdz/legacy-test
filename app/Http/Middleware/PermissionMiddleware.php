<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use App\Exceptions\Custom\BadRequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class PermissionMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if (Auth::guest()) {
            throw new AuthenticationException();
        }

        if (!isset($request['user_profile_id'])) throw new BadRequestException(__("messages.bad-request"));

        $conditions = [
            ['id', $request['user_profile_id']]
        ];
        $response = \App\Models\UserProfile::where($conditions)
            ->with('roles.permissions')
            ->whereHas('roles.permissions', function ($query) use ($permission) {
                $query->where('name', $permission);
            })->first();

        if (!$response) throw new AuthorizationException();

        /* if (!$request->user()->can($permission)) {
            throw new AuthorizationException();
        } */

        return $next($request);
    }
}
