<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class ExternalStudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->bearerToken() || config('app.api_external_student') <> $request->bearerToken())
            throw new AuthenticationException(__('messages.no-credentials'));

        return $next($request);
    }
}
