<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            $domain = parse_url(config('app.url'), PHP_URL_HOST);
            $api = ['api'];
            $web = ['web'];

            Route::domain($domain)
                ->prefix('api')
                ->middleware($api)
                ->namespace($this->namespace)
                ->group(base_path('routes/landlord/api.php'));

            if (config('multitenancy.enabled') == true) {
                array_push($api, 'tenant.api');
                array_push($web, 'tenant.web');
            }

            Route::prefix('api')
                ->middleware($api)
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware($web)
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
