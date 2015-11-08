<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace_frontend   = 'App\Http\Controllers\Frontend';
    protected $namespace_backend    = 'App\Http\Controllers\Backend';
    protected $namespace_auth       = 'App\Http\Controllers\Auth';



    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace_frontend], function ($router) {
            require app_path('Http/routes/frontend.php');
        });

        $router->group(['namespace' => $this->namespace_backend], function ($router) {
            require app_path('Http/routes/backend.php');
        });

        $router->group(['namespace' => $this->namespace_auth], function ($router) {
            require app_path('Http/routes/auth.php');
        });

    }
}
