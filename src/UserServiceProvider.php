<?php

namespace Kankosal\User;

use Illuminate\Support\ServiceProvider;

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
                __DIR__.'/config/config.php' => config_path('admin_user.php'),
            ], 'config');

            if (! class_exists('CreateUsersTable')) {
                $this->publishes([
                  __DIR__ . '/database/migrations/2014_10_12_000000_create_users_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_users_table.php'),
                  // you can add any number of migrations here
                ], 'migrations');
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }
}
