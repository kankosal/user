<?php

namespace Kankosal\User;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/admin_user.php' => config_path('admin_user.php'),
            ], 'config');

            // Publish assets
            $this->publishes([
                __DIR__.'/resources/assets' => public_path('/'),
            ], 'assets');

            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/resources/views', 'admin_user');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('admin_user.prefix'),
            'middleware' => config('admin_user.middleware'),
        ];
    }
}
