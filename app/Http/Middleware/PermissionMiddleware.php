<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Cache\UserProfileCache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use App\Exceptions\Custom\BadRequestException;
use Illuminate\Auth\AuthenticationException;

class PermissionMiddleware
{
    protected $userProfileCache;

    public function __construct(UserProfileCache $userProfileCache) {
        $this->userProfileCache = $userProfileCache;
    }
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
            throw new AuthenticationException(__('messages.no-credentials'));
        }

        if (!isset($request['user_profile_id'])) throw new BadRequestException(__("messages.bad-request"));

        $conditionals = [
            ['id', $request['user_profile_id']]
        ];
        $response = $this->userProfileCache->validationUserProfile($conditionals, $request['user_profile_id'], $permission);

        if (!$response) throw new AuthorizationException();

        /* if (!$request->user()->can($permission)) {
            throw new AuthorizationException();
        } */

        return $next($request);
    }
}
