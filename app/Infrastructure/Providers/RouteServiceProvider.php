<?php

namespace Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $userNamespace = 'User\Http\Controllers';
    protected $adminNamespace = 'Admin\Http\Controllers';
    protected $publicNamespace = 'PublicSite\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapUserRoutes();
        $this->mapAdminRoutes();
        $this->mapPublicRoutes();
    }

    public function mapUserRoutes()
    {
        Route::prefix('user')
            ->middleware('api')
            ->namespace($this->userNamespace)
            ->group(app_path('Modules/User/Http/routes.php'));
    }

    public function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware('api')
            ->namespace($this->adminNamespace)
            ->group(app_path('Modules/Admin/Http/routes.php'));
    }

    public function mapPublicRoutes()
    {
        Route::middleware('api')
            ->namespace($this->publicNamespace)
            ->group(app_path('Modules/PublicSite/Http/routes.php'));
    }
}
