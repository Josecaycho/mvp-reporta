<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $adminNamespace = 'App\Http\Controllers\Admin';
    protected $loginNamespace = 'App\Http\Controllers\Auth';
    

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
        $this->mapApiRoutes();
        $this->maploginRoutes();
        $this->mapAdminRoutes();
        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        if (file_exists(base_path('routes/api.php'))) {
        Route::prefix('api')
             ->middleware('api')
             ->middleware(['web', 'cors'])
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
        }    
    }

    protected function mapAdminRoutes()
    {
        if (file_exists(base_path('routes/admin.php'))) {
            Route::prefix('admin')
                ->middleware(['web', 'auth'])
                ->namespace($this->adminNamespace)
                ->group(base_path('routes/admin.php'));
        }
    }

    protected function mapLoginRoutes()
    {
        if (file_exists(base_path('routes/login.php'))) {
            Route::prefix('admin')
                ->middleware(['web'])
                ->namespace($this->loginNamespace)
                ->group(base_path('routes/login.php'));
        }
    }
}
